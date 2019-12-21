<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\user;
use Faker\Generator as Faker;
use Illuminate\support\Str;

$factory->define(user::class, function (Faker $faker) {
    return [
        'name' 			=> $faker->name,
        'email' 		=> $faker->email,
        'phone' 		=> $faker->phoneNumber,
        'password' 		=> $faker->password,
        'access_token' 	=> Str::random(60)
    ];
});
