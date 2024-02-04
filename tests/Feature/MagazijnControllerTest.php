<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;
use App\Models\Allergeen;
use App\Models\ProductsPerAllergeen;

class MagazijnControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testAllergenenViewWithAllergenen()
    {
        // Create a product
        $product = Product::factory()->create();

        // Create an allergeen associated with the product
        $allergen = Allergeen::factory()->create();
        ProductsPerAllergeen::factory()->create([
            'productsId' => $product->id,
            'allergeensId' => $allergen->id,
        ]);

        // Go to route with created product
        $response = $this->get(route('magazijn.allergenen', ['productId' => $product->id]));

        // Check if response has the product details
        $response->assertSee($product->naam);
        $response->assertSee($allergen->naam);
    }

    // Function to check if product has no allergenen
    public function testAllergenenViewWithoutAllergenen()
    {
        // Create a product
        $product = Product::factory()->create();

        // Go to route with created product
        $response = $this->get(route('magazijn.allergenen', ['productId' => $product->id]));

        // Check if response has a product without an allergeen
        $response->assertSee("In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken");
    }
}
