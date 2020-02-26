<?php

namespace App\XTChallenge\Models\MySQL;

use Illuminate\Database\Eloquent\Model;

class ErrorTransaction extends Model
{
    protected $connection = 'mysql';

    protected $table = 'error_transactions';

    /******************************************************************************
     *
     * Relationships
     *
     ******************************************************************************/

    public function transaction() {
        return $this->belongsTo('App\XTChallenge\Models\MySQL\Transaction', 'transaction_id');
    }
}
