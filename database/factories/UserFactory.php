<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Student::class, function () {
    $faker = Faker::create('id_ID');
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->email,
        'password' => bcrypt('dayung231'),
        'phone' => $faker->unique()->phoneNumber,
        'gender' => $faker->numberBetween(0,1),
        'city' => $faker->city,
        'ttl' => $faker->dateTimeBetween('1995-01-01', '2000-12-31')->format('Y-m-d'),
        'description' => $faker->optional()->text(200),
        'intake' => $faker->numberBetween(2016,2020),
        'batch' => $faker->numberBetween(2014,2020),
        'status' => $faker->numberBetween(0,1),
        'line' => $faker->userName,
        'faculty' => $faker->jobTitle,
        'remember_token' => Str::random(10),
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
