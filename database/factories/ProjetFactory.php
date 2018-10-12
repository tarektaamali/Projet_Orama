<?php
use App\Model\Etat;
use App\Model\Projet;
use App\User;
use App\Model\Service;
use Faker\Generator as Faker;

$factory->define(Projet::class, function (Faker $faker) {
    return [
        'objet'=>$faker->word,
        'description'=>$faker->paragraph(),
        'lieu' =>$faker->streetAddress,
        'etat_id'=>function(){
        return Etat::all()->random();
        },
        'user_id'=>function(){
            return User::all()->random();
        },
        'service_id'=>function(){
            return Service::all()->random();
        },
         'region_id'=>function() {
             return \App\Model\Region::all()->random();
         },
        'realisateur_id'=>function(){
            return User::all()->random();
             }

    ];
});
/*date($format = 'Y-m-d', $max = 'now')

 *             $table->increments('id');
            $table->string('titre');
            $table->string('adresse');
            $table->string('description');
            $table->string('etat');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('admin_id')->unsigned()->nullable();;
            $table->foreign('admin_id')->references('id')->on('admins');
 */