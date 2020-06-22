<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Request;
use Faker\Generator as Faker;

$factory->define(Request::class, function (Faker $faker) {
  return [
      'type' => '',
      'message' => $faker->text(10),
      'author' => $faker->text(5),
      'email' => 'mail@mail.ru',
  ];
});
