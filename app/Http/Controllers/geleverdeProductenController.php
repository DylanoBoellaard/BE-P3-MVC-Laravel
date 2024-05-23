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
                'products.id',
                DB::raw('SUM(productsPerLeveranciers.aantal) as totaalGeleverd')
            )
            ->join('leveranciers', 'productsPerLeveranciers.leveranciersId', '=', 'leveranciers.id')
            ->join('products', 'productsPerLeveranciers.productsId', '=', 'products.id')
            ->groupBy('leveranciers.naam', 'leveranciers.contactPersoon', 'products.naam', 'products.id')
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

    public function specificatieProduct($productId, $startDate, $endDate)
    {
        // Query to retrieve product name and allergens
        $productDetails = DB::table('products')
            ->select(
                'products.naam as ProductNaam',
                DB::raw('GROUP_CONCAT(allergeens.naam SEPARATOR ", ") as Allergenen')
            )
            ->join('productsPerAllergeens', 'products.id', '=', 'productsPerAllergeens.productsId')
            ->join('allergeens', 'allergeens.id', '=', 'productsPerAllergeens.allergeensId')
            ->where('products.id', $productId)
            ->groupBy('products.id')
            ->first();

        // Query to retrieve product details with the delivery dates and amounts
        $query = DB::table('productsPerLeveranciers')
            ->select(
                'productsPerLeveranciers.datumLevering',
                'productsPerLeveranciers.aantal'
            )
            ->join('products', 'productsPerLeveranciers.productsId', '=', 'products.id')
            ->where('products.id', $productId);

        // If dates are "empty" / not submitted by user and thus filled with 'all'
        // If user submitted dates through filter, add where statement to filter DB results with the submitted dates
        if ($startDate !== 'all' && $endDate !== 'all') {
            $query->whereBetween('productsPerLeveranciers.datumLevering', [$startDate, $endDate]);
        }

        // Retrieve DB results regardless if user filtered the dates
        $productDeliveryDetails = $query->distinct()->get();

        // Return to view with all DB results & dates
        return view('geleverdeProducten.specificatieProduct', [
            'productDetails' => $productDetails,
            'productDeliveryDetails' => $productDeliveryDetails,
            'startDate' => $startDate,
            'endDate' => $endDate
        ]);
    }
}
