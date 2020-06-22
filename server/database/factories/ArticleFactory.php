<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
  return [
    'subject' => $faker->text(10),
    'name' => $faker->text(10),
    'content' => $faker->text(300),
    'tags' => $faker->text(30),
    'user_id' => 1,
    'request_id' => 2,
  ];
});
