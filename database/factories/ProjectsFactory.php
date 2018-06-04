<?php

use Faker\Generator as Faker;

$factory->define(App\Projects::class, function (Faker $faker) {
    $status = ['A', 'I', 'C'];
    $date = $faker->dateTimeBetween('-2 years', 'now');

    return [
        'customer_id' => rand(1,50),
        'project_name' => $faker->sentence(rand(3,6)),
        'project_details' => $faker->paragraphs(rand(3,6), true),
        'project_status' => $status[rand(0,2)],
        'project_date' => $date,
        'project_date_completed' => $date,
    ];
});
