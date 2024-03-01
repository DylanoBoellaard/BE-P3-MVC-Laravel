<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeverancierController extends Controller
{
    public function index()
    {
        // Get product details
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

        return view('leverancier.geleverdeProducten', [
            'leverancierId' => $leverancierId // change
        ]);
    }
}
