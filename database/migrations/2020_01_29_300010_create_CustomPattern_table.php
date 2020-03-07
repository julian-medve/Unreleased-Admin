<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomPatternTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CustomPattern', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Name', 255);
            $table->string('Preview', 255);
            
            $table->bigInteger('PriceCategory')->unsigned()->index()->nullable();
            $table->foreign('PriceCategory')->references('Id')->on('PriceCategory')->onDelete('cascade');

            $table->bigInteger('TypeCategory')->unsigned()->index()->nullable();
            $table->foreign('TypeCategory')->references('Id')->on('TypeCategory')->onDelete('cascade');

            $table->bigInteger('Submitter')->unsigned()->index();
            $table->foreign('Submitter')->references('id')->on('users')->onDelete('cascade');

            $table->boolean('Approved')->nullable();
            $table->boolean('Accepted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CustomPattern');
    }
}
