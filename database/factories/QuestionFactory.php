<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Question;
use Faker\Generator as Faker;

$factory->define(Question::class, function (Faker $faker) {
    return [
        'question_content' => $faker->realText(rand(100,1000),1),
        'difficulty' => $faker->numberBetween(1,3),
        'category_id' => $faker->numberBetween(1, 10),
    ];
});
