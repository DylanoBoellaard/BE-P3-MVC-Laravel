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
        // Get leverancier geleverde producten details
        $leverancierInfo = DB::table('leveranciers')
            ->select(
                'leveranciers.id',
                'leveranciers.naam',
                'leveranciers.contactPersoon',
                'leveranciers.leverancierNummer',
                'leveranciers.mobiel',
                'contact.straat',
                'contact.huisnummer',
                'contact.postcode',
                'contact.stad'
            )
            ->join('contact', 'leveranciers.id', '=', 'contact.leveranciersId')
            ->where('leveranciers.id', $leverancierId)
            ->get();

        // Redirect to details page
        return view('leverancier.wijzigen', [
            'leverancierInfo' => $leverancierInfo
        ]);
    }

    public function wijzigenGegevens($leverancierId)
    {
        // Get leverancier and contact info
        $leverancierInfo = DB::table('leveranciers')
            ->select(
                'leveranciers.id',
                'leveranciers.naam',
                'leveranciers.contactPersoon',
                'leveranciers.leverancierNummer',
                'leveranciers.mobiel',
                'contact.straat',
                'contact.huisnummer',
                'contact.postcode',
                'contact.stad'
            )
            ->join('contact', 'leveranciers.id', '=', 'contact.leveranciersId')
            ->where('leveranciers.id', $leverancierId)
            ->get();

        // Redirect to form page
        return view('leverancier.wijzigenGegevens', [
            'leverancierInfo' => $leverancierInfo
        ]);
    }

    public function updateLeverancier(Request $request, $leverancierId)
    {
        // Retrieve the data from the request sent by the form
        $data = $request->only([
            'naam',
            'contactPersoon',
            'leverancierNummer',
            'mobiel',
            'straat',
            'huisnummer',
            'postcode',
            'stad'
        ]);

        try {
            // Find the leverancier record by leverancierId
            $leverancier = Leverancier::findOrFail($leverancierId);

            // Update leverancier fields
            $leverancier->update([
                'naam' => $data['naam'],
                'contactPersoon' => $data['contactPersoon'],
                'leverancierNummer' => $data['leverancierNummer'],
                'mobiel' => $data['mobiel']
            ]);

            // Update contact fields
            $leverancier->contact()->update([ // Finds first result in contact table based on leverancier found earlier. Requires model relationships to work
                'straat' => $data['straat'],
                'huisnummer' => $data['huisnummer'],
                'postcode' => $data['postcode'],
                'stad' => $data['stad']
            ]);

            // Redirect with success message
            return redirect()->route('leverancier.wijzigen', $leverancierId)->with('success', 'De wijzigingen zijn doorgevoerd.');
        } catch (\Exception $e) {
            // Parse the default exception message
            $errorMessage = $e->getMessage();

            // Initialize default error message
            $customErrorMessage = "Er is een fout opgedtreden. De wijzigingen zijn niet doorgevoerd. Probeer het opnieuw.";

            // Extract the specific error info based on the error message
            // Needs optimising with loop?
            switch (true) {
                case (strpos($errorMessage, "Data too long for column 'naam'") !== false):
                    $customErrorMessage = "Naam is te lang.";
                    break;
                case (strpos($errorMessage, "Data too long for column 'contactPersoon'") !== false):
                    $customErrorMessage = "Contact persoon is te lang.";
                    break;
                case (strpos($errorMessage, "Data too long for column 'leverancierNummer'") !== false):
                    $customErrorMessage = "Leverancier nummer is te lang.";
                    break;
                case (strpos($errorMessage, "Data too long for column 'mobiel'") !== false):
                    $customErrorMessage = "Het telefoonnummer is te lang.";
                    break;
                case (strpos($errorMessage, "Data too long for column 'straat'") !== false):
                    $customErrorMessage = "Straat is te lang.";
                    break;
                case (strpos($errorMessage, "Data too long for column 'huisnummer'") !== false):
                    $customErrorMessage = "Huisnummer is te lang.";
                    break;
                case (strpos($errorMessage, "Data too long for column 'postcode'") !== false):
                    $customErrorMessage = "Postcode is te lang.";
                    break;
                case (strpos($errorMessage, "Data too long for column 'stad'") !== false):
                    $customErrorMessage = "Stad is te lang.";
                    break;
                default:
                    // Nothing, keeps default message
                    break;
            }

            // Redirect with the custom error message
            return redirect()->route('leverancier.wijzigen', $leverancierId)->withErrors(['error' => $customErrorMessage]);
        }
    }
}
