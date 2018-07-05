<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName($gender = null|'male'|'female'),
        'surname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'age' => $faker->numberBetween($min = 1, $max = 120),
        'gender' => $faker->randomElement($array = array ('male','female')),
        'pwl' => $faker->streetName,
        'user_weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = NULL),
        'target_weight' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 1, $max = NULL),
        'remember_token' => str_random(10),
    ];
});
