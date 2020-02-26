<?php

namespace App\XTChallenge\Models\MySQL;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $connection = 'mysql';

    protected $table = 'transactions';

    protected $fillable = [
        'account_number',
        'type',
        'original_transaction_id',
        'sent_at'
    ];

    /******************************************************************************
     *
     * Relationships
     *
     ******************************************************************************/

    public function pendingOutbound() {
        return $this->hasOne('App\XTChallenge\Models\MySQL\PendingOutbound', 'transaction_id');
    }

    public function errorTransaction() {
        return $this->hasOne('App\XTChallenge\Models\MySQL\ErrorTransaction', 'transaction_id');
    }
}
