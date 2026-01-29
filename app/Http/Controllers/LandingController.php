<?php

namespace App\Http\Controllers;

use App\Models\Kamar;

class LandingController extends Controller
{
    public function index()
    {
        $totalKamar     = Kamar::count();
        $kamarKosong    = Kamar::where('status', 'kosong')->count();

        return view('landing', compact('totalKamar','kamarKosong'));
    }
}
