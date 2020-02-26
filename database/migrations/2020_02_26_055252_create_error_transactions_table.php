<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateErrorTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('error_transactions', function (Blueprint $table) {
            // Fields
            $table->bigIncrements('id');

            // Foreign Keys
            $table->unsignedBigInteger('transaction_id');

            // Foreign Keys Constraints
            $table->foreign('transaction_id')->references('id')->on('transactions');

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
        Schema::dropIfExists('error_transactions');
    }
}
