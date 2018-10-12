<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Feedback::class, function (Faker $faker) {
    return [
        'avis' =>$faker->numberBetween(1,5),
         'note'=>$faker->paragraph(),
        'user_id'=>function(){
            return \App\User::all()->random();
        },
        'realisateur_id'=>function(){
            return \App\User::all()->random();
        },
    ];


});
/*



$table->string('name');
            $table->string('email');
            $table->text('message');




*/