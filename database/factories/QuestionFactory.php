<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question_content' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'category_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});
