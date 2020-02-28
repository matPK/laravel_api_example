<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Example;
use Faker\Generator as Faker;

$factory->define(Example::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
    ];
});
