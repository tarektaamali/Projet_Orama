<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRapports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   Schema::create('rapports', function (Blueprint $table) {
        $table->increments('id');
        $table->string('title');
        $table->string('note');
        $table->string('img');
        $table->integer('projet_id')->unsigned()->nullable();
        $table->foreign('projet_id')->references('id')->on('projets');
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
        //
    }
}
