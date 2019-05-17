<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Mail::class, function (Faker $faker) {
    return [
        'body' => $faker->paragraph,
        'email' => $faker->email
    ];
});
