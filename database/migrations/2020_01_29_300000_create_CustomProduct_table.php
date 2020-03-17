<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CustomProduct', function (Blueprint $table) {
            $table->bigIncrements('Id')->unsigned();
            $table->string('SKU', 255)->nullable();
            $table->string('Name', 255);
            $table->string('Description', 255);
            $table->biginteger('Price');
            $table->string('Sizes', 255);
            $table->string('Preview', 255)->nullable();
            $table->string('Model', 255)->nullable();

            $table->string('ColorPrice', 255)->nullable();
            $table->string('TextPrice', 255)->nullable();

            $table->text('PartPrices')->nullable();
            $table->boolean('Status')->nullable();
            $table->bigInteger('Submitter')->unsigned()->index();
            $table->foreign('Submitter')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CustomProduct');
    }
}
