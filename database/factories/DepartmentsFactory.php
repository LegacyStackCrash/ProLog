<?php

use Faker\Generator as Faker;

$factory->define(App\Departments::class, function (Faker $faker) {
    return [
        'department_name' => ucfirst($faker->word())
    ];
});
