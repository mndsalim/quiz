<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\question_answer;
use Faker\Generator as Faker;

$factory->define(question_answer::class, function (Faker $faker) {
    return [
        'question_id' 	=> $App\question::where('is_active', 1)->inRandomOrder()->take(1)->first()->question_id,
        'first_answer' 	=> rand(10, 200),
        'scound_answer' => rand(10, 200),
        'thard_answer' 	=> rand(10, 200),
        'fourth_answer' => rand(10, 200),
        'correct_answer'=> 3 
    ];
});
