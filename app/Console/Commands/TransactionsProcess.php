<?php

namespace App\Console\Commands;

use App\XTChallenge\Services\TransactionsProcessService;
use Illuminate\Console\Command;

class TransactionsProcess extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:process';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Process the transactions that has not been processed in the database yet.';

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
    public function handle(TransactionsProcessService $transactionsProcessService)
    {
        $this->comment('Transactions process started');
        $transactionsProcessService->processTransactions();
        $this->info('Transactions process completed');
    }
}
