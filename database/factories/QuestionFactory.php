<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question_content' => $faker->sentence,
        'category_id' => $faker->numberBetween(1, 10),
    ];
});
