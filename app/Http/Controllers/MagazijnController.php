<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Magazijn;
use Illuminate\Support\Facades\DB;

class MagazijnController extends Controller
{
    public function index()
    {
        $productList = Magazijn::select('magazijns.verpakkingsEenheid', 'magazijns.aantalAanwezig', 'products.id', 'products.naam', 'products.barcode', )
            ->join('products', 'products.id', '=', 'magazijns.productsId')
            ->orderBy('products.barcode', 'asc')
            ->get();

        return view('magazijn.index', [
            'productList' => $productList
        ]);
    }
}
