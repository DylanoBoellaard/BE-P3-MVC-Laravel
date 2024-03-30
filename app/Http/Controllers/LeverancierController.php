<?php

namespace App\Http\Controllers;

use App\Models\Leverancier;
use App\Models\Magazijn;
use App\Models\ProductsPerLeverancier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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

    public function toevoegenLevering($productId, $leverancierId)
    {
        // Get leverancier info
        $leverancierInfo = Leverancier::find($leverancierId);

        // Return to view
        return view('leverancier.toevoegenLevering', compact('leverancierInfo', 'productId'));
    }

    public function storeLevering(Request $request, $productId, $leverancierId)
    {
        // Validate the incoming request data
        $validatedData = request()->validate([
            'aantal' => 'required|integer|min:1',
            'datum' => 'required|date',
        ]);

        /* ------------------------------------
            OLDER DATE VALIDATION STUFF
            Check if the filled-in date is older than today's date
        */
        $selectedDate = Carbon::parse($validatedData['datum']);
        $today = Carbon::today();

        if ($selectedDate->lt($today)) {
            // If the filled-in date is older than today's date, flash error message to the session / page
            Session::flash('error', 'Deze datum ligt in het verleden, graag een nieuwe datum in voeren');

            // Redirect back to the toevoegenLevering page with filled-in values using the {{old()}} things in the value fields
            return redirect()->back()->withInput();
        }

        /* ------------------------------------
            REGULAR CORRECT FORM STUFF
            Update the aantalAanwezig field in the magazijns table
        */
        $magazijn = Magazijn::where('productsId', $productId)->firstOrFail();
        $magazijn->aantalAanwezig += $validatedData['aantal'];
        $magazijn->save();

        // Add a new row in the productsPerLeveranciers table
        productsPerLeverancier::create([
            'leveranciersId' => $leverancierId,
            'productsId' => $productId,
            'datumLevering' => $validatedData['datum'],
            'datumEerstVolgendeLevering' => $validatedData['datum'],
            'aantal' => $validatedData['aantal'],
        ]);

        // Flash success message to the session / page
        Session::flash('success', 'Levering successvol toegevoegd');

        // Redirect back to the geleverdeProducten page
        return redirect()->route('leverancier.geleverdeProducten', ['leverancierId' => $leverancierId]);
    }

    public function wijzigen($leverancierId)
    {
        // Get leverancier info
        $leverancierInfo = Leverancier::find($leverancierId);

        // Return to view
        return view('leverancier.wijzigen', compact('leverancierInfo'));
    }
}
