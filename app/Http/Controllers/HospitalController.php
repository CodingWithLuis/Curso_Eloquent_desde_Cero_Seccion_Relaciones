<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\View\View;

class HospitalController extends Controller
{
    public function index(): View
    {
        $hospitals = Hospital::with('doctors')->get();

        return view('hospitals.index', compact('hospitals'));
    }
}
