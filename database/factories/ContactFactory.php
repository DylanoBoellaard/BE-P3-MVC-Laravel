<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Leverancier;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leverancier>
 */
class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'straat' => $this->faker->streetName,
            'huisnummer' => $this->faker->buildingNumber,
            'postcode' => $this->faker->postcode,
            'stad' => $this->faker->city,
            'isActief' => true,
            'opmerkingen' => $this->faker->sentence,
        ];
    }
}
