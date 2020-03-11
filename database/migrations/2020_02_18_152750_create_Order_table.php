<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order', function (Blueprint $table) {
            $table->bigIncrements('Id');

            $table->bigInteger('UserId')->unsigned()->index();
            // $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');

            $table->string('Date', 255);
            $table->bigInteger('TotalPrice');
            $table->string('PromotionCode')->nullable();
            $table->integer('Count');
            $table->bigInteger('AddressIndex')->default(0);
            $table->integer('Status')->unsigned()->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Order');
    }
}
