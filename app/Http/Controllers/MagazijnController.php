<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Magazijn;

class MagazijnController extends Controller
{
    public function index()
    {
        // Opvragen gegevens en doorsturen...

        return view('magazijn.index');
    }
}
