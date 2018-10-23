<?php

use Faker\Generator as Faker;

$factory->define(App\Customers::class, function (Faker $faker) {

    $name = $faker->unique()->word();
    $city = $faker->unique()->city();

    return [
        'customer_name' => ucwords($name),
        'customer_city' => ucwords($city),
        'customer_state' => $faker->stateAbbr(),
        'customer_phone' => substr($faker->tollFreePhoneNumber(), 0, 15),
    ];
});
