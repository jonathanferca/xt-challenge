<?php

namespace App\XTChallenge\Services;

use App\Imports\TransactionsImport as TransactionsImport;
use Maatwebsite\Excel\Facades\Excel;

class TransactionsImportService
{
    public function importTransactions($filePath, $disk = null) {
        Excel::import(new TransactionsImport, $filePath, $disk);
    }
}
