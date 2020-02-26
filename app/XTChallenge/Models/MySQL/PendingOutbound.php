<?php

namespace App\XTChallenge\Models\MySQL;

use Illuminate\Database\Eloquent\Model;

class PendingOutbound extends Model
{
    protected $connection = 'mysql';

    protected $table = 'pending_outbound';

    /******************************************************************************
     *
     * Relationships
     *
     ******************************************************************************/

    public function transaction() {
        return $this->belongsTo('App\XTChallenge\Models\MySQL\Transaction', 'transaction_id');
    }
}
