<?php

use Faker\Generator as Faker;

$factory->define(App\CategoryUser::class, function (Faker $faker) {
    return [
        'user_id' =>  $faker->numberBetween(1,10),
		'category_id' =>  $faker->numberBetween(1,10),
    ];
});
