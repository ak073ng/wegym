<?php

use Faker\Generator as Faker;

$factory->define(App\Workout::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'location' => $faker->streetName,
        'exercise_type' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'instructor' => $faker->name,
        'objective' => $faker->sentence($nbWords = 6, $variableNbWords = true)
    ];
});
