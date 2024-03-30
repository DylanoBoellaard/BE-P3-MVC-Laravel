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

    public function testLeverancierIndexPage()
{
    // Sends a GET request to the leverancier index route
    $response = $this->get(route('leverancier.index'));

    // Assert that the response status is 200 (OK)
    $response->assertStatus(200);
}
}
