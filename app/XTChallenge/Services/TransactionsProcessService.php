<?php

namespace App\XTChallenge\Services;

use App\XTChallenge\Models\MySQL\Transaction;
use App\XTChallenge\Repositories\TransactionsRepository;

class TransactionsProcessService
{
    protected $transactionsRepository;

    public function __construct(TransactionsRepository $transactionsRepository)
    {
        $this->transactionsRepository = $transactionsRepository;
    }

    public function processTransactions() {
        // Get all transactions not processed from database
        $unprocessedTransactions = $this->transactionsRepository->getUnprocessedTransactions();

        // Process each transaction
        foreach($unprocessedTransactions as $unprocessedTransaction) {
            $this->processTransaction($unprocessedTransaction);
        }
    }

    public function processTransaction(Transaction $transaction) {
        switch($transaction->type) {
            case 'Accept Enrollment':
                $this->transactionsRepository->processAcceptEnrollmentTransaction($transaction);
            break;
            case 'Reject Enrollment':
                $this->transactionsRepository->processRejectEnrollmentTransaction($transaction);
            break;
            case 'Reject Change':
                $this->transactionsRepository->processRejectChangeTransaction($transaction);
            break;
        }
    }
}
