<?php

use Faker\Generator as Faker;
use App\User;
use App\Model\Service;
use App\Model\Rapport;
$factory->define(App\Model\Reservation::class, function (Faker $faker) {
    return [
        'title'=>$faker->word,
         'description'=>$faker->paragraph(),
       'adresse' =>$faker->streetAddress,
        'etat'=>"en attente",
        'user_id'=>function(){
            return User::all()->random();
        },
        'service_id'=>function(){
        return Service::all()->random();
    },

        'rapport_id'=>function(){
        return Rapport::all()->random();
    }
    ];
});
/*
 *   $table->string('title');
            $table->string('adresse');
            $table->string('description');
            $table->string('etat');
 */