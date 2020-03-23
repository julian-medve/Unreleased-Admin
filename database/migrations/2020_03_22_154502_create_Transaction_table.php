<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transaction', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger("order_id");
            $table->string("transaction_time", 255);
            $table->string("transaction_status", 255);
            $table->string("transaction_id", 255);
            $table->string("status_message", 255);
            $table->string("status_code", 255);
            $table->string("signature_key", 255);
            $table->string("settlement_time", 255);
            $table->string("payment_type", 255);
            $table->string("merchant_id", 255);
            $table->string("gross_amount", 255);
            $table->string("fraud_status", 255);
            $table->string("currency", 255);
            $table->string("approval_code", 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Transaction');
    }
}
