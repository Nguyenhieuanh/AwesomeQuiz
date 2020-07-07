<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'answer_content' => $faker->realText(rand(50,700),rand(1,2)),
        'question_id' => $faker->numberBetween(1,200),
        'correct' => $faker->numberBetween(0,1),
    ];
});
