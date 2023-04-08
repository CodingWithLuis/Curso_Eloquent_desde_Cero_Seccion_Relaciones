<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Hospital;
use App\Models\Profile;
use App\Models\User;
use Illuminate\View\View;

class PolymorphicController extends Controller
{

    public function indexHasOne(): View
    {
        $profiles = Profile::with('image', 'user')->get();

        $countries = Country::with('image')->get();

        return view('polymorphic.has_one', compact('profiles', 'countries'));
    }

    public function indexHasMany(): View
    {
        $hospitals = Hospital::with('documents')->get();

        $users = User::with('documents')->get();

        return view('polymorphic.has_many', compact('hospitals', 'users'));
    }
}
