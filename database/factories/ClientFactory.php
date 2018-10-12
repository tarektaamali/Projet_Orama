<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
       'name'=>$faker->firstNameMale,
        'lastname'=>$faker->lastName,
        'email'=>$faker->email,
         'password'=>$faker->password
    ];
});
/*
 *
 *
 *
 * $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
 *
 *
 *
 *
 *
 *
 *
 *
 *
 */