<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'naam' => $this->faker->word,
            'barcode' => $this->faker->unique()->ean13,
            'isActief' => true,
            'opmerkingen' => $this->faker->sentence,
        ];
    }
}