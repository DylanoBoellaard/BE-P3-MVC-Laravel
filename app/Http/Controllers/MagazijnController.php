<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use Illuminate\Http\Request;
use App\Models\Magazijn;
use App\Models\Product;
use App\Models\ProductsPerAllergeen;
use App\Models\ProductsPerLeverancier;
use Illuminate\Support\Facades\DB;

class MagazijnController extends Controller
{
    public function index()
    {
        // Get product details
        $productList = Magazijn::select('magazijns.verpakkingsEenheid', 'magazijns.aantalAanwezig', 'products.id', 'products.naam', 'products.barcode',)
            ->join('products', 'products.id', '=', 'magazijns.productsId')
            ->orderBy('products.barcode', 'asc')
            ->get();

        return view('magazijn.index', [
            'productList' => $productList
        ]);
    }

    public function levering($productId)
    {
        // Get product details using the ID
        $product = Product::find($productId);

        // Get leverancier info for associated product
        $leverancierList = Leverancier::join('productsPerLeveranciers', 'leveranciers.id', '=', 'productsPerLeveranciers.leveranciersId')
            ->where('productsPerLeveranciers.productsId', $productId)
            ->select('leveranciers.*')
            ->distinct()
            ->get();

        // Get productsPerLeveranciers info for associated product
        $leveringList = $product->productsPerLeveranciers;

        // Check if the product has null or (less than) 0 in the aantalAanwezig field in the magazijns table - US1 - Scenario 2
        $magazijnInfo = Magazijn::where('productsId', $productId)->first();

        // If aantalAanwezig = 0, redirect & send message
        if ($magazijnInfo && ($magazijnInfo->aantalAanwezig === null || $magazijnInfo->aantalAanwezig <= 0)) {
            $message = "Er is van dit product op dit moment geen voorraad aanwezig, de verwachte eerstvolgende levering is: " . $product->productsPerLeveranciers->first()->datumEerstVolgendeLevering;
            return view('magazijn.levering', compact('message', 'leverancierList'));
        }

        // Normal redirect - US1 - Scenario 1
        return view('magazijn.levering', compact('product', 'leverancierList', 'leveringList'));
    }
}
