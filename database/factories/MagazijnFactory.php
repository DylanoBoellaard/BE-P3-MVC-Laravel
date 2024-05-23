<?php

namespace Database\Factories;

use App\Models\Magazijn;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class MagazijnFactory extends Factory
{
    protected $model = Magazijn::class;

    public function definition()
    {
        return [
            // 'productsId' => Product::factory(),
            'verpakkingsEenheid' => $this->faker->numberBetween(0,50),
            'aantalAanwezig' => $this->faker->numberBetween(0, 200),
            'isActief' => true,
            'opmerkingen' => $this->faker->sentence,
        ];
    }
}