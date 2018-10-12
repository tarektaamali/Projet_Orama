<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('prenom');
                $table->string('nom');
                $table->string('email')->unique();
                $table->string('societe')->nullable();
                $table->string('role');
                $table->string('adresse')->nullable();
                $table->string('status')->nullable();
                $table->string('password');
                $table->string('device_token')->nullable();
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
        Schema::dropIfExists('users');
    }
}
