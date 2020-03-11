<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
            'nombre' => $faker->sentence(1),
            'descripcion' => $faker->paragraph,
            'precio' => $faker->randomFloat(2,5,150),
            'stock' => $faker->numberBetween(1,100),
            'imagen' => $faker->randomElement(['1.png','2.png','3.png','4.png','5.png','6.png','7.png','8.png','9.png','10.png','11.png','12.png','13.png','14.png','15.png','16.png','17.png','18.png','19.png','20.png','21.png','22.png','23.png','24.png','25.png','26.png','27.png','28.png','29.png','30.png','31.png','32.png']),
            'category_id' => $faker->numberBetween(1,5)
    ];
});
