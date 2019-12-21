<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\question;
use Faker\Generator as Faker;

$factory->define(question::class, function (Faker $faker) {
    return [
        'group_id' => 1,
        'question' => rand(1,9) . ' x ' . rand(1,9),
        // 'group_id' => 2,
        // 'question' => rand(1,9) . ' / ' . rand(1,9),
        'is_active' => 1
    ];
});
