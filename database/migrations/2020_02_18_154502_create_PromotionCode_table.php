<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionCodeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PromotionCode', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string("Name", 255);
            $table->text("Description");
            $table->string("Code", 255);
            $table->float("Quota", 255);
            $table->bigInteger('UsedCustomer')->unsigned()->index()->nullable();
            $table->foreign('UsedCustomer')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('PromotionCode');
    }
}
