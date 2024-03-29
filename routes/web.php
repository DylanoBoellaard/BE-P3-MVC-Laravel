<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MagazijnController;

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

// Magazijn overzicht
Route::get('/index', [MagazijnController::class, 'index'])->name('magazijn.index');

// Product levering info
Route::get('/magazijn/{productId}', [MagazijnController::class, 'levering'])->name('magazijn.levering');

// Product allergenen info
Route::get('/{productId}', [MagazijnController::class, 'allergenen'])->name('magazijn.allergenen');