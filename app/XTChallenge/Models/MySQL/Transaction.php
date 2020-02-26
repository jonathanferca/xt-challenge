<?php

namespace App\XTChallenge\Models\MySQL;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $connection = 'mysql';

    protected $table = 'transactions';

    /******************************************************************************
     *
     * Relationships
     *
     ******************************************************************************/

    public function pendingOutbounds() {
        return $this->hasMany('App\XTChallenge\Models\MySQL\PendingOutbound', 'transaction_id');
    }

    public function errorTransactions() {
        return $this->hasMany('App\XTChallenge\Models\MySQL\ErrorTransaction', 'transaction_id');
    }
}
