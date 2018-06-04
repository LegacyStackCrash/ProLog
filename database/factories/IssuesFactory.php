<?php

use Faker\Generator as Faker;

$factory->define(App\Issues::class, function (Faker $faker) {

    $status = ['A', 'I', 'C'];
    $date = $faker->dateTimeBetween('-2 years', 'now');

    return [
        'customer_id' => rand(1,50),
        'issue_name' => $faker->sentence(rand(3,6)),
        'issue_details' => $faker->paragraphs(rand(3,6), true),
        'issue_status' => $status[rand(0,2)],
        'issue_date_time' => $date,
        'issue_date_time_completed' => $date,
        'issue_duration_days' => 0,
        'issue_duration_hours' => 0,
        'issue_duration_minutes' => 0,
    ];
});
