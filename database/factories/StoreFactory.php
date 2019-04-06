<?php

use Faker\Generator as Faker;
use App\Models\Store;

$factory->define(Store::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'geolocation' => DB::raw("(GeomFromText('POINT({$faker->latitude} {$faker->longitude})'))"),
        'genre' => '',
        'comment' => ''
    ];
});
