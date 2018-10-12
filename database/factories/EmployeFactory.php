<?php
use App\Model\admin;
use App\Model\Projet;
use Faker\Generator as Faker;

$factory->define(App\Model\Employe::class, function (Faker $faker) {
    return [
        'firstname'=>$faker->firstNameMale,
        'lastname'=>$faker->lastName ,
        'email'=>$faker->email,
        'phone'=>$faker->e164PhoneNumber,
        'projet_id'=>function(){
        return projet::all()->random();
}

    ];
});
/*
 *
 *
 *
 *
 *
 *
 *          $table->string('name');
            $table->string('email')->unique();
            $table->string('phone','12');
            $table->integer('admin_id')->unsigned();
 */