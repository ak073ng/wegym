<?php

use Faker\Generator as Faker;

$factory->define(App\GymLocation::class, function (Faker $faker) {
    return [
        'name' =>$faker->company,
        'location' =>$faker->streetName,
        'description' =>$faker->paragraph($nbSentences = 2, $variableNbSentences = true),
        'latitude' =>$faker->latitude($min = -1.99, $max = -1.00),
        'longitude' =>$faker->longitude($min = 36.00, $max = 36.99)
    ];
});
