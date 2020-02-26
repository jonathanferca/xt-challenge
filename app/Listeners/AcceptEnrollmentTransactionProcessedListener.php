<?php

namespace App\Listeners;

use App\Events\AcceptEnrollmentTransactionProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class AcceptEnrollmentTransactionProcessedListener
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
     * @param  AcceptEnrollmentTransactionProcessed  $event
     * @return void
     */
    public function handle(AcceptEnrollmentTransactionProcessed $event)
    {
        Log::info("I'm ready to trigger actions on Accept Enrollment Transactions");
    }
}
