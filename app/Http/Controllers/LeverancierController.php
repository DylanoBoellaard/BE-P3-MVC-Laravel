<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use App\Models\ProductsPerLeverancier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeverancierController extends Controller
{
    public function index()
    {
        // Get leverancier details
        $leverancierList = Leverancier::select(
            'leveranciers.id',
            'leveranciers.naam',
            'leveranciers.contactPersoon',
            'leveranciers.leverancierNummer',
            'leveranciers.mobiel',
            DB::raw('COUNT(DISTINCT productsPerLeveranciers.productsId) AS aantal_verschillende_producten')
        )
            ->leftJoin('productsPerLeveranciers', 'leveranciers.id', '=', 'productsPerLeveranciers.leveranciersId')
            ->orderBy('aantal_verschillende_producten', 'desc')
            ->groupBy('leveranciers.id')
            ->get();

        return view('leverancier.index', [
            'leverancierList' => $leverancierList
        ]);
    }

    public function geleverdeProducten($leverancierId)
    {
        // Get leverancier info
        $leverancierInfo = Leverancier::find($leverancierId);

        // Get leverancier geleverde producten details
        $leveringList = DB::table('products')
            ->select('products.id', 'products.naam', 'magazijns.aantalAanwezig', 'magazijns.verpakkingsEenheid', DB::raw('MAX(productsPerLeveranciers.datumLevering) as datumLevering'))
            ->join('magazijns', 'products.id', '=', 'magazijns.productsId')
            ->join('productsPerLeveranciers', 'products.id', '=', 'productsPerLeveranciers.productsId')
            ->where('productsPerLeveranciers.leveranciersId', $leverancierId)
            ->orderBy('magazijns.aantalAanwezig', 'desc')
            ->groupBy('products.id', 'products.naam', 'magazijns.aantalAanwezig', 'magazijns.verpakkingsEenheid')
            ->get();

        return view('leverancier.geleverdeProducten', [
            'leverancierInfo' => $leverancierInfo,
            'leveringList' => $leveringList
        ]);
    }
}
