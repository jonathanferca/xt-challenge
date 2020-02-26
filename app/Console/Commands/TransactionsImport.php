<?php

namespace App\Console\Commands;

use App\XTChallenge\Services\TransactionsImportService;
use Illuminate\Console\Command;

class TransactionsImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:import';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports transactions from the import.csv file located in the inbound disk.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(TransactionsImportService $transactionsImportService)
    {
        $this->comment('Transactions import started');
        $transactionsImportService->importTransactions('import.csv', 'inbound');
        $this->info('Transactions import completed');

        // Triggering the transactions:process command after importation
        $this->call('transactions:process');
    }
}
