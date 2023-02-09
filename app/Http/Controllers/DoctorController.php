<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\Doctor;
use App\Models\Hospital;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DoctorController extends Controller
{

    public function index(): View
    {
        $doctors = Doctor::with('hospital')->get();

        return view('doctors.index', compact('doctors'));
    }

    public function create(): View
    {
        $hospitals = Hospital::pluck('name', 'id');

        return view('doctors.create', compact('hospitals'));
    }

    public function store(StoreDoctorRequest $request): RedirectResponse
    {
        Doctor::create($request->validated());

        return redirect()->route('doctors.index');
    }

    public function edit(Doctor $doctor): View
    {
        $doctor->load('hospital');

        $hospitals = Hospital::pluck('name', 'id');

        return view('doctors.edit', compact('doctor', 'hospitals'));
    }

    public function update(UpdateDoctorRequest $request, Doctor $doctor): RedirectResponse
    {
        $doctor->update($request->validated());

        return redirect()->route('doctors.index');
    }
}
