<?php
use App\Model\Projet;
use Faker\Generator as Faker;

$factory->define(App\Model\Rapport::class, function (Faker $faker) {
    return [
        'title' =>$faker->word ,
        'note'=>$faker->paragraph(),
        'img'=>'x0A7ra7sFk4dr8OdpwXU3e2Sp5GfNKuttUNUiLHH.jpeg',
        'projet_id'=>function(){
            return Projet::all()->random();
        },

    ];
});
/*

       $table->increments('id');
            $table->string('title');
            $table->string('note');
            $table->integer('admin_id')->unsigned();







        */