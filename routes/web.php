<?php

use App\Http\Controllers\AllergeenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\LeverancierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Magazijn
// Magazijn overzicht
Route::get('/index', [MagazijnController::class, 'index'])->name('magazijn.index');

// Product levering info
Route::get('/magazijn/{productId}', [MagazijnController::class, 'levering'])->name('magazijn.levering');

// Product allergenen info
Route::get('/{productId}', [MagazijnController::class, 'allergenen'])->name('magazijn.allergenen');

// Leverancier
// Leverancier overzicht
Route::get('/leverancier/index', [LeverancierController::class, 'index'])->name('leverancier.index');

// Door leverancier geleverde producten
Route::get('/leverancier/geleverdeProducten/{leverancierId}', [LeverancierController::class, 'geleverdeProducten'])->name('leverancier.geleverdeProducten');

// Toevoegen product levering pagina
Route::get('/leverancier/toevoegenLevering/{productId}/{leverancierId}', [LeverancierController::class, 'toevoegenLevering'])->name('leverancier.toevoegenLevering');

// Form submit page
Route::post('/leverancier/storeLevering/{productId}/{leverancierId}', [LeverancierController::class, 'storeLevering'])->name('leverancier.storeLevering');

// Leverancier details wijzigen index pagina
Route::get('/leverancier/wijzigen/{leverancierId}', [LeverancierController::class, 'wijzigen'])->name('leverancier.wijzigen');

// Wijzigen gegevens leverancier & contact tables
Route::get('/leverancier/wijzigenGegevens/{leverancierId}', [LeverancierController::class, 'wijzigenGegevens'])->name('leverancier.wijzigenGegevens');

// Page for handling form update request for gegevens leverancier & contact
Route::put('/leverancier/updateLeverancier/{leverancierId}', [LeverancierController::class, 'updateLeverancier'])->name('leverancier.updateLeverancier');


// Allergenen
// Allergeen overzicht
Route::get('/allergeen/index', [AllergeenController::class, 'index'])->name('allergeen.index');
Route::get('/allergeen/index/filter', [AllergeenController::class, 'index'])->name('allergeen.index.filter');

// Overzicht leveranciers
Route::get('/allergeen/overzicht_leveranciers/{productId}', [AllergeenController::class, 'overzicht_leveranciers'])->name('allergeen.overzicht_leveranciers');