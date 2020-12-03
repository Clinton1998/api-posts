<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\{Comment,Post};
use Faker\Generator as Faker;
use App\User;

$factory->define(Comment::class, function (Faker $faker) {
    return [
    	'user_id' => User::all()->random(),
    	'post_id' => Post::all()->random(),
        'content' => $faker->text($maxNbChars = 200),
    ];
});
