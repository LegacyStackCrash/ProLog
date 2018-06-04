<?php

use Faker\Generator as Faker;

$factory->define(App\Customers::class, function (Faker $faker) {

    $city = $faker->unique()->city();
    $agency = ['PD', 'SO', 'FD'];

    return [
        'customer_name' => $city.' '.$agency[rand(0,2)],
        'customer_city' => $city,
        'customer_state' => $faker->stateAbbr(),
        'customer_phone' => substr($faker->tollFreePhoneNumber(),0, 15),
    ];
});
