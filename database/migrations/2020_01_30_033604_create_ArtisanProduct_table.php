<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisanProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArtisanProduct', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Name', 255);
            $table->text('Description');
            $table->string('Price', 255);
            $table->string('Size', 255);
            $table->string('Quantity', 255);
            $table->text('Preview');
            $table->boolean('Status')->nullable();

            $table->bigInteger('ArtisanCategory')->unsigned()->index();
            $table->foreign('ArtisanCategory')->references('Id')->on('ArtisanCategory')->onDelete('cascade');
            
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
        Schema::dropIfExists('ArtisanProduct');
    }
}
