<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{

    public function index(): View
    {
        $doctors = Doctor::with('hospital')->get();

        return view('doctors.index', compact('doctors'));
    }
}
