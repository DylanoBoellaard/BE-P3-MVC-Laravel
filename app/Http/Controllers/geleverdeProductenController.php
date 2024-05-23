<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class geleverdeProductenController extends Controller
{
    public function index(Request $request)
    {
        // Retrieve date input field details
        $startDate = $request->input('startdate');
        $endDate = $request->input('enddate');

        // Query for the database details. Does not retrieve data yet
        $query = DB::table('productsPerLeveranciers')
            ->select(
                'leveranciers.naam as leverancierNaam',
                'leveranciers.contactPersoon',
                'products.naam as productNaam',
                DB::raw('SUM(productsPerLeveranciers.aantal) as totaalGeleverd')
            )
            ->join('leveranciers', 'productsPerLeveranciers.leveranciersId', '=', 'leveranciers.id')
            ->join('products', 'productsPerLeveranciers.productsId', '=', 'products.id')
            ->groupBy('leveranciers.naam', 'leveranciers.contactPersoon', 'products.naam')
            ->orderBy('products.naam', 'desc');

        // Use date input field details to check if user filled a date in to filter on a specific period
        // If not, skip if statement
        if ($startDate && $endDate) {
            $query->whereBetween('productsPerLeveranciers.datumLevering', [$startDate, $endDate]);
        }

        // Search and retrieve DB results, with or without the extra date filter
        $geleverdeProducten = $query->get();

        // Return to view with the database & user submitted date results
        return view('geleverdeProducten.index', [
            'geleverdeProducten' => $geleverdeProducten,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }
}
