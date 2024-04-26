<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllergeenController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve selected allergen from the request
        $selectedAllergeen = $request->input('allergeen');
    
        // Get product details with allergen filter
        $query = Product::select(
            'products.id',
            'products.naam',
            'allergeens.naam as allergenen_naam',
            'allergeens.omschrijving as allergenen_omschrijving',
            DB::raw('SUM(magazijns.aantalAanwezig) as aantalAanwezig')
        )
            ->join('productsPerAllergeens', 'products.id', '=', 'productsPerAllergeens.productsId')
            ->join('magazijns', 'products.id', '=', 'magazijns.productsId')
            ->join('allergeens', 'allergeens.id', '=', 'productsPerAllergeens.allergeensId')
            ->orderBy('products.naam', 'asc')
            ->groupBy('products.id', 'products.naam', 'allergeens.naam', 'allergeens.omschrijving');
    
        // Apply allergen filter if an allergen is selected
        if ($selectedAllergeen) {
            $query->where('allergeens.naam', $selectedAllergeen);
        }
    
        // Retrieve the filtered allergen list
        $allergenenList = $query->get();
    
        // Pass the filtered allergen list to the view
        return view('allergeen.index', [
            'allergenenList' => $allergenenList
        ]);
    }

    public function overzicht_leveranciers($productId)
    {
        // Retrieve DB details
        $leverancierList = DB::table('leveranciers')
            ->select(
                'leveranciers.id',
                'leveranciers.naam',
                'leveranciers.contactPersoon',
                'leveranciers.mobiel',
                'contact.stad',
                'contact.straat',
                'contact.huisnummer'
            )
            ->leftJoin('contact', 'leveranciers.id', '=', 'contact.leveranciersId')
            ->join('productsPerLeveranciers', 'leveranciers.id', '=', 'productsPerLeveranciers.leveranciersId')
            ->where('productsPerLeveranciers.productsId', $productId)
            ->groupBy('leveranciers.id', 'contact.stad', 'contact.straat', 'contact.huisnummer')
            ->get();
    
        // Return to view
        return view('allergeen.overzicht_leveranciers', [
            'leverancierList' => $leverancierList,
        ]);
    }
    
}
