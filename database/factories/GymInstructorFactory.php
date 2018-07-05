<?php

use Faker\Generator as Faker;

$factory->define(App\GymInstructor::class, function (Faker $faker) {
    return [
        'name' =>$faker->name,
        'image' =>$faker->image($dir = storage_path('images'), $width = 500, $height = 500),
        'contact' =>$faker->e164PhoneNumber,
        'email' =>$faker->email,
        'gender' =>$faker->randomElement($array = array ('male','female')),
        'rating' =>$faker->numberBetween($min = 1, $max = 5)
    ];
});
