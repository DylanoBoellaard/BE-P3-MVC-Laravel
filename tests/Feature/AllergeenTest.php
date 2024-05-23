<?php

namespace Tests\Feature;
use App\Models\Allergeen;
use App\Models\Magazijn;
use App\Models\Product;
use App\Models\ProductsPerAllergeen;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AllergeenTest extends TestCase
{
    use RefreshDatabase;

    public function test_displays_allergen_details()
    {
        // Create a product
        $product = Product::factory()->create();

        // Create an allergeen associated with the product
        $allergen = Allergeen::factory()->create();
        ProductsPerAllergeen::factory()->create([
            'productsId' => $product->id,
            'allergeensId' => $allergen->id,
        ]);

        Magazijn::factory()->create([
            'productsId' => $product->id,
            'aantalAanwezig' => 50,
        ]);

        // Go to route with created product
        $response = $this->get(route('allergeen.index'));

        // Check if response has the product details
        $response->assertSee($product->naam);
        $response->assertSee($allergen->naam);
    }

    public function test_displays_allergen_details_with_filter()
    {
        // Create a product
        $product = Product::factory()->create();

        // Create an allergen associated with the product
        $allergen = Allergeen::factory()->create();
        ProductsPerAllergeen::factory()->create([
            'productsId' => $product->id,
            'allergeensId' => $allergen->id,
        ]);

        Magazijn::factory()->create([
            'productsId' => $product->id,
            'aantalAanwezig' => 50,
        ]);

        // Create another product with a different allergen
        $product2 = Product::factory()->create();
        $allergen2 = Allergeen::factory()->create();
        ProductsPerAllergeen::factory()->create([
            'productsId' => $product2->id,
            'allergeensId' => $allergen2->id,
        ]);

        Magazijn::factory()->create([
            'productsId' => $product2->id,
            'aantalAanwezig' => 70,
        ]);

        // Simulate selecting an allergen from the filter
        $selectedAllergen = $allergen->naam;
        $response = $this->get(route('allergeen.index.filter', ['allergen' => $selectedAllergen]));

        // Check if only products associated with the selected allergen are displayed
        $response->assertSee($product->naam);
        $response->assertSee($allergen->naam);

        // Ensure product with different allergen is not displayed
        $response->assertDontSee($product2->naam); 
        $response->assertDontSee($allergen2->naam);
    }
}
