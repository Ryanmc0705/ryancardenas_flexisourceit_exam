<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string("firstname")->nullable();
            $table->string("lastname")->nullable();
            $table->string("gender")->nullable();
            $table->string("email")->nullable();
            $table->string("uuid")->nullable();
            $table->string("username")->nullable();
            $table->string("password")->nullable();
            $table->string("salt")->nullable();
            $table->string("md5")->nullable();
            $table->string("sha1")->nullable();
            $table->string("sha256")->nullable();
            $table->dateTime("dob")->nullable();
            $table->string("age")->nullable();
            $table->dateTime("registered_date")->nullable();
            $table->string("registered_age")->nullable();
            $table->string("phone")->nullable();
            $table->string("cell")->nullable();
            $table->string("country")->nullable();
            $table->string("city")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
};
