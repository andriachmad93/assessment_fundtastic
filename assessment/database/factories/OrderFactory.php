<?php

$factory->define(App\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'invoice' => str_random(10),
        'product_name' => $faker->name,
        'email' => $faker->safeEmail,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];
});