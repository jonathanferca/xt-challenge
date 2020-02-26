<?php

namespace App\XTChallenge\Repositories;

use App\Events\AcceptEnrollmentTransactionProcessed;
use App\Events\RejectEnrollmentTransactionProcessed;
use App\Events\RejectChangeTransactionProcessed;
use App\XTChallenge\Models\MySQL\Account;
use App\XTChallenge\Models\MySQL\ErrorTransaction;
use App\XTChallenge\Models\MySQL\PendingOutbound;
use App\XTChallenge\Models\MySQL\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionsRepository {

    protected $Transaction;

    public function __construct(Transaction $transaction) {
        $this->Transaction = $transaction;
    }

    public function getUnprocessedTransactions() {
        return $this->Transaction->whereNull('processed_at')->get();
    }

    public function processAcceptEnrollmentTransaction(Transaction $transaction) {
        DB::transaction(function() use ($transaction) {
            $process_datetime = now()->format('Y-m-d H:i:s');

            // Update enrolled_at for corresponding account
            $account = Account::where('account_number', '=', $transaction->account_number)->first();
            $account->enrolled_at = $process_datetime;
            $account->save();

            // Create record in pending_outbound table
            $pending_outbound = new PendingOutbound(['type' => 'Request Historical Usage']);
            $transaction->pendingOutbound()->save($pending_outbound);

            // Update process_at for transaction
            $transaction->processed_at = $process_datetime;
            $transaction->save();

            // Emit event depending on transaction type
            event(new AcceptEnrollmentTransactionProcessed($transaction));
        });
    }

    public function processRejectEnrollmentTransaction(Transaction $transaction) {
        DB::transaction(function() use ($transaction) {
            $process_datetime = now()->format('Y-m-d H:i:s');

            // Create record in error_transaction table
            $error_transaction = new ErrorTransaction();
            $transaction->errorTransaction()->save($error_transaction);

            // Update process_at in transaction
            $transaction->processed_at = $process_datetime;
            $transaction->save();

            // Emit event depending on transaction type
            event(new RejectEnrollmentTransactionProcessed($transaction));
        });
    }

    public function processRejectChangeTransaction(Transaction $transaction) {
        DB::transaction(function() use ($transaction) {
            $process_datetime = now()->format('Y-m-d H:i:s');

            // Create record in error_transaction table
            $error_transaction = new ErrorTransaction();
            $transaction->errorTransaction()->save($error_transaction);

            // Update process_at in transaction
            $transaction->processed_at = $process_datetime;
            $transaction->save();

            // Emit event depending on transaction type
            event(new RejectChangeTransactionProcessed($transaction));
        });
    }
}
