<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArtisanCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ArtisanCategory', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string('Name', 255);
            $table->text('Description');
            $table->string('PreviewImage', 255);
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
        Schema::dropIfExists('ArtisanCategory');
    }
}
