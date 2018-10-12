<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Article::class, function (Faker $faker) {
    return [
       'title'=>$faker->word,
       'subtitle'=>$faker->word,
        'post'=>$faker->paragraph($nbSentences = 20, $variableNbSentences = true) ,
        'image'=> "x0A7ra7sFk4dr8OdpwXU3e2Sp5GfNKuttUNUiLHH.jpeg"
    ];
});
/*
 *       $table->string('title');
            $table->string('subtitle');
            $table->text('post');
            $table->string('image');
 *
 *
 *
 *
 *
 *
 *
 */