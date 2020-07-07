<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Answer;
use Faker\Generator as Faker;

$factory->define(Answer::class, function (Faker $faker) {
    return [
        'answer_content' => $faker->sentence(5),
        'question_id' => $faker->numberBetween(1,100),
    ];
});
