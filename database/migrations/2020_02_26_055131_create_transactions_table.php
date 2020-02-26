<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            // Fields
            $table->bigIncrements('id');
            $table->string('account_number');
            $table->enum('type', ['AcceptEnrollment', 'RejectEnrollment', 'RejectChange'])->default('AcceptEnrollment');
            $table->bigInteger('original_transaction_id');
            $table->dateTime('sent_at');
            $table->dateTime('processed_at');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
