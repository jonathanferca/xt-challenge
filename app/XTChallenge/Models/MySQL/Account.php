<?php

namespace App\XTChallenge\Models\MySQL;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $connection = 'mysql';

    protected $table = 'accounts';

    /******************************************************************************
     *
     * Relationships
     *
     ******************************************************************************/
}
