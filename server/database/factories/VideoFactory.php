<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Video;
use Faker\Generator as Faker;

$factory->define(Video::class, function (Faker $faker) {
  return [
    'name' => $faker->text(10),
    'path' => 'videos/d6dKaYI1tScHM4jlVL3OPngERf5fTLlisJ01iSG3.mp4',
    'tags' => $faker->text(30),
    'user_id' => 1,
    'request_id' => 3
  ];
});
