<?php

namespace Tests\Feature;

use App\Models\Leverancier;
use App\Models\Product;
use App\Models\ProductsPerLeverancier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GeleverdeProductenTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_view_with_all_products_without_date_filter()
    {
        // Create test data
        $leverancier = Leverancier::factory()->create();
        $product = Product::factory()->create();
        $productsPerLeverancier = ProductsPerLeverancier::factory()->create([
            'leveranciersId' => $leverancier->id,
            'productsId' => $product->id,
            'datumLevering' => now(),
            'aantal' => 10,
        ]);

        // Check if index method and page cna be reached
        $response = $this->get(route('geleverdeProducten.index'));

        // Check if the view is correct and data is passed
        $response->assertStatus(200);
        $response->assertViewIs('geleverdeProducten.index');
        $response->assertViewHas('geleverdeProducten', function ($geleverdeProducten) use ($productsPerLeverancier) {
            return $geleverdeProducten->contains('id', $productsPerLeverancier->id);
        });
    }

    public function test_index_returns_view_with_date_filter()
    {
        // Create test data
        $leverancier = Leverancier::factory()->create();
        $product = Product::factory()->create();
        $dateInRange = now()->subDays(5);
        $dateOutOfRange = now()->subDays(20);

        $productInRange = ProductsPerLeverancier::factory()->create([
            'leveranciersId' => $leverancier->id,
            'productsId' => $product->id,
            'datumLevering' => $dateInRange,
            'aantal' => 10,
        ]);

        $productOutOfRange = ProductsPerLeverancier::factory()->create([
            'leveranciersId' => $leverancier->id,
            'productsId' => $product->id,
            'datumLevering' => $dateOutOfRange,
            'aantal' => 5,
        ]);

        // Check if method cna be reached with dates for filter
        $response = $this->get(route('geleverdeProducten.index', [
            'startdate' => now()->subDays(10)->toDateString(),
            'enddate' => now()->toDateString(),
        ]));

        // Check if the view is correct and data is passed
        $response->assertStatus(200);
        $response->assertViewIs('geleverdeProducten.index');
        $response->assertViewHas('geleverdeProducten', function ($geleverdeProducten) use ($productInRange, $productOutOfRange) {
            return $geleverdeProducten->contains('id', $productInRange->id) &&
                   !$geleverdeProducten->contains('id', $productOutOfRange->id);
        });
    }
}
