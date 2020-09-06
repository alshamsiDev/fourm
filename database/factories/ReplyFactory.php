<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reply;
use Faker\Generator as Faker;

$factory->define(Reply::class, function (Faker $faker) {
    return [
        'user_id' => factory('App\User'),
        'thread_id' => factory('App\Thread'),
        'body' => $faker->paragraph,
    ];
});
