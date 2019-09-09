<?php

use Faker\Generator as Faker;

$factory->define(App\Company::class, function (Faker $faker) {
    $company = $faker->company;
    return [
        'var_razon_social' => $company,
        'var_nombre_comercial' => $company,
        'var_nro_documento' => $faker->randomNumber,
        'var_direccion' => $faker->address, 
        'var_telefono' => $faker->phoneNumber, 
        'var_celular' => $faker->tollFreePhoneNumber, 
        'var_email' => $faker->unique()->companyEmail, 
        'var_pais' => $faker->country,
    ];
});
