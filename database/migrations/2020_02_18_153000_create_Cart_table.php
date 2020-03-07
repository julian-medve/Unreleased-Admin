<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cart', function (Blueprint $table) {
            
            $table->bigIncrements('Id');
            
            $table->bigInteger('UserId')->unsigned()->index();
            $table->foreign('UserId')->references('id')->on('users')->onDelete('cascade');

            $table->bigInteger('ShoeId')->unsigned();

            $table->bigInteger('ShoePrice');
            $table->string('ShoeSize');
            $table->bigInteger('ShoeCount');
            $table->string('CustomImage');
            $table->string('CustomImages');
            $table->boolean('IsArtisan');
            $table->bigInteger('OrderId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Cart');
    }
}
