<?php

namespace App\Listeners;

use App\Events\RejectChangeTransactionProcessed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class RejectChangeTransactionProcessedListener
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
     * @param  RejectChangeTransactionProcessed  $event
     * @return void
     */
    public function handle(RejectChangeTransactionProcessed $event)
    {
        Log::info("I'm ready to trigger actions on Reject Change Transactions");
    }
}
