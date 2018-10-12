<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(\App\Model\Proposition::class, function (Faker $faker) {
    return [
        'devis'=>$faker->word,
        'description'=>$faker->paragraph(),
        'echenance' =>"6j",
        'start_date'=>"2018-07-03",
        'projet_id'=>function(){
            return \App\Model\Projet::all()->random();
        },
        'user_id'=>function(){
            return User::all()->random();
        }
    ];
});
