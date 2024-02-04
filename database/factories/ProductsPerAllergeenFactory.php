<?php

namespace Database\Factories;

use App\Models\ProductsPerAllergeen;
use App\Models\Product;
use App\Models\Allergeen;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsPerAllergeenFactory extends Factory
{
    protected $model = ProductsPerAllergeen::class;

    public function definition()
    {
        return [
            'productsId' => Product::factory(),
            'allergeensId' => Allergeen::factory(),
            'isActief' => true,
            'opmerkingen' => $this->faker->sentence,
        ];
    }
}
