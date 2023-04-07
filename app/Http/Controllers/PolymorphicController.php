<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PolymorphicController extends Controller
{

    public function indexHasOne(): View
    {
        return view('polymorphic.has_one');
    }

    public function indexHasMany(): View
    {
        return view('polymorphic.has_many');
    }
}
