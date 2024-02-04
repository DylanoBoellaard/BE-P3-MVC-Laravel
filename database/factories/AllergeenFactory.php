<?php

namespace Database\Factories;

use App\Models\Allergeen;
use Illuminate\Database\Eloquent\Factories\Factory;

class AllergeenFactory extends Factory
{
    protected $model = Allergeen::class;

    public function definition()
    {
        return [
            'naam' => $this->faker->word,
            'omschrijving' => $this->faker->sentence,
            'isActief' => true,
            'opmerkingen' => $this->faker->sentence,
        ];
    }
}
