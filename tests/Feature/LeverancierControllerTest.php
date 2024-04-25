<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Controllers\LeverancierController;
use App\Models\Leverancier;
use Illuminate\Http\Request;

class LeverancierControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testLeverancierIndexPage()
    {
        // Sends a GET request to the leverancier index route
        $response = $this->get(route('leverancier.index'));

        // Assert that the response status is 200 (OK)
        $response->assertStatus(200);
    }

    public function testupdate_leverancier_and_contact_details()
    {
        // Create a Leverancier record
        $leverancier = Leverancier::factory()->create();

        // Generate test data for update
        $updateData = [
            'naam' => $this->faker->name,
            'contactPersoon' => $this->faker->name,
            'leverancierNummer' => $this->faker->randomNumber(),
            'mobiel' => $this->faker->phoneNumber,
            'straat' => $this->faker->streetName,
            'huisnummer' => $this->faker->buildingNumber,
            'postcode' => $this->faker->postcode,
            'stad' => $this->faker->city,
        ];

        // Make a request to update the leverancier
        $response = $this->put(route('leverancier.updateLeverancier', $leverancier->id), $updateData);

        // Assert that the response is a succesful redirect
        $response->assertStatus(302);
    }

    public function testfailed_mobiel_update_leverancier_and_contact_details()
    {
        // Create a Leverancier record
        $leverancier = Leverancier::factory()->create();

        // Generate test data for update
        $updateData = [
            'naam' => $this->faker->name,
            'contactPersoon' => $this->faker->name,
            'leverancierNummer' => $this->faker->randomNumber(),
            'mobiel' => '1234567891011121314151617181920', // should be too long and should give an error
            'straat' => $this->faker->streetName,
            'huisnummer' => $this->faker->buildingNumber,
            'postcode' => $this->faker->postcode,
            'stad' => $this->faker->city,
        ];

        // Make a request to update the leverancier
        $response = $this->put(route('leverancier.updateLeverancier', $leverancier->id), $updateData);

        // Assert that the response is a succesful redirect
        $response->assertStatus(302);

        // Assert that the page gives a specific error
        $response->assertSessionHasErrors([
            'error' => 'Mobiel is te lang.'
        ]);
    }
}
