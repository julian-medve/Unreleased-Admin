<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email', 255);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role');

            $table->boolean('gender')->nullable();
            $table->string('birthday')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable();
            $table->bigInteger('default_address')->nullable();

            $table->boolean('allowed')->nullable();

            // $table->bigInteger('role')->unsigned()->index();
            // $table->foreign('role')->references('id')->on('userrole')->onDelete('cascade');
            
            $table->rememberToken();
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
        Schema::dropIfExists('Users');
    }
}
