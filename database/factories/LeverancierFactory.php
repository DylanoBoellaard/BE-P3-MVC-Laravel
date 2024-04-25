<?php

namespace Database\Factories;

use App\Models\Leverancier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leverancier>
 */
class LeverancierFactory extends Factory
{
    protected $model = Leverancier::class;

    public function definition()
    {
        return [
            'naam' => $this->faker->word,
            'contactPersoon' => $this->faker->name,
            'leveranciernummer' => $this->faker->unique()->uuid,
            'mobiel' => $this->faker->phoneNumber,
            'isActief' => true,
            'opmerkingen' => $this->faker->sentence,
        ];
    }
}
