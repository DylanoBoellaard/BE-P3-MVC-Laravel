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
        $product = Product::find($productId);

        $leverancierList = Leverancier::join('productsPerLeveranciers', 'leveranciers.id', '=', 'productsPerLeveranciers.leveranciersId')
            ->where('productsPerLeveranciers.productsId', $productId)
            ->select('leveranciers.*')
            ->distinct()
            ->get();

        $leveringList = $product->productsPerLeveranciers;

        return view('magazijn.levering', compact('product', 'leverancierList', 'leveringList'));
    }
}
