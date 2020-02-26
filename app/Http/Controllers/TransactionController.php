<?php

namespace App\Http\Controllers;

use App\Http\Resources\Transaction as TransactionResource;
use App\XTChallenge\Models\MySQL\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->validate([
            "account_number" => "required",
            "type" => ["required", Rule::in(['Accept Enrollment'])],
            "original_transaction_id" => "required|unique:transactions,original_transaction_id",
            "sent_at" => "required"
        ]);

        $transaction = new Transaction;
        $transaction->account_number = $request->account_number;
        $transaction->type = $request->type;
        $transaction->original_transaction_id = $request->original_transaction_id;
        $transaction->sent_at = $request->sent_at;
        $transaction->save();

        return new TransactionResource($transaction);
    }
}
