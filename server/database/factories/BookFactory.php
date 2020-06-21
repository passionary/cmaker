<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
  return [
    'genre' => $faker->text(10),
    'name' => $faker->text(10),
    'size' => rand(300,2000),
    'count_of_pages' => rand(100,1000),
    'tags' => $faker->text(30),
    'request_id' => 1
  ];
});
