<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Leverancier;
use App\Models\ProductsPerLeverancier;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leverancier>
 */
$factory->define(ProductsPerLeverancier::class, function (Faker $faker) {
    // Get all leverancier IDs and product IDs
    $leverancierIds = Leverancier::pluck('id')->toArray();
    $productIds = Product::pluck('id')->toArray();

    return [
        'leveranciersId' => $faker->randomElement($leverancierIds),
        'productsId' => $faker->randomElement($productIds),
        'datumLevering' => $faker->date(),
        'aantal' => $faker->numberBetween(1, 100),
        'datumEerstVolgendeLevering' => $faker->date(),
    ];
});
