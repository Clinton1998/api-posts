<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;
use App\User;

$factory->define(Post::class, function (Faker $faker) {
    return [
    	'author_id' => User::all()->random(),
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'content' => $faker->text($maxNbChars = 200)
    ];
});
