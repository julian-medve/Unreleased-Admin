<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ShippingCost', function (Blueprint $table) {
            $table->bigIncrements('Id');
            $table->string("Country", 255);
            $table->string("Province", 255);
            $table->string("City", 255);
            $table->float("Cost");
            $table->string("PostalCode", 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ShippingCost');
    }
}
