<?php

use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => bcrypt('123456'),
        'avatar' => '1512582883.jpeg',
        'phone' => str_random(11),
        'address' => $faker->address,
        'role' => $faker->randomElement(['admin' ,'customer']),
        'created_at' => new DateTime()
    ];
});

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'status' => 1,
        'created_at' => new DateTime()
    ];
});

$factory->define(App\Models\DiscountFood::class, function (Faker $faker) {
    $date = Carbon::create(2017, 11, 27, 0, 0, 0);
    return [
        'discount' => rand(0, 100),
        'start_date' => $date->format('Y-m-d H:i:s'),
        'end_date' => $date->addWeeks(rand(1, 5))->format('Y-m-d H:i:s')
    ];
});

$factory->define(App\Models\Food::class, function (Faker $faker) {
    $date = Carbon::create(2017, 11, 27, 0, 0, 0);
    return [
        'name' => $faker->name,
        'image' => '1dn52jliiZbmXcfbJs8rMXj0FfOA4BLm8M6xgwG3.png',
        'discount_id' => rand(1, 10),
        'price' => rand(1, 10) * 10000,
        'status' => 1,
        'description' => $faker->paragraph,
        'is_top' => rand(0, 1),
        'category_id' => rand(1, 6),
        'created_at' => new DateTime()
    ];
});
