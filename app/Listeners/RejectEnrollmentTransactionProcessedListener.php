<?php

namespace App\Listeners;

use App\Events\RejectEnrollmentTransactionProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class RejectEnrollmentTransactionProcessedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  RejectEnrollmentTransactionProcessed  $event
     * @return void
     */
    public function handle(RejectEnrollmentTransactionProcessed $event)
    {
        Log::info("I'm ready to trigger actions on Reject Enrollment Transactions");
    }
}
