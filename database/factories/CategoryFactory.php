<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
   $sentence = $faker->sentence;
   return [
        'var_slug' => str_slug($sentence),
		'var_name' => $sentence,
    ];
});
