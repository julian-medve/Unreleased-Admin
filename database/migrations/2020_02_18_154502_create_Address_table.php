<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Address', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->bigInteger('UserId')->unsigned()->index();
            $table->string("Alias", 255);
            $table->string("FullName", 255);
            $table->string("Country", 255);
            $table->string("Province", 255);
            $table->string("City", 255);
            $table->string("PostalCode", 255);
            $table->string("Phone", 255);
            $table->text("AddressDetail");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Address');
    }
}
