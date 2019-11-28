<?php

use Faker\Generator as Faker;

$factory->define(App\Answer::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph(rand(10,20),true),
        'user_id' =>App\User::pluck('id')->random(),
        'vote_count' => rand(0,10),
        
    ];
});
