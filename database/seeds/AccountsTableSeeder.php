<?php

use App\Account;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    public function run()
    {
        $accountNumbers = [
            8107655201,
            2679925340,
            7586397594,
            7353458350,
            2650294092,
            6129183432,
            1875041719,
            6321932592
        ];

        collect($accountNumbers)->each(function ($number) {
            Account::create([
                'account_number' => $number,
            ]);
        });
    }
}
