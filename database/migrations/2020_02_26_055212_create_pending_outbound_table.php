<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendingOutboundTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pending_outbound', function (Blueprint $table) {
            // Fields
            $table->bigIncrements('id');
            $table->enum('type', ['RequestHistoricalUsage'])->default('RequestHistoricalUsage');

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
        Schema::dropIfExists('pending_outbound');
    }
}
