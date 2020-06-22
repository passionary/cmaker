<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
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

$factory->define(User::class, function (Faker $faker) {
  return [
    'username' => $faker->name,
    'email' => 'jet.aldik@gmail.com',
    'email_verified_at' => now(),
    'password' => '$2y$10$5onUhGSKAM4J.J6aFUf7F.MySvNs6D4bqBy/Gb70kV78C7lJhtWUq', // some
    'api_token' => Str::random(60),
    'remember_token' => Str::random(10),
  ];
});