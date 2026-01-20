<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Train;
use Illuminate\Http\Request;

class TrainController extends Controller
{
    public function index()
    {
        // Recupera i treni dove l'orario di partenza è maggiore o uguale a oggi
        // Ordinati per orario di partenza
        $trains = Train::where('departure_time', '>=', now())
                        ->orderBy('departure_time', 'asc')
                        ->get();

        return view('home', compact('trains'));
    }
}