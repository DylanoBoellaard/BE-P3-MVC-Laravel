<?php

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
});

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