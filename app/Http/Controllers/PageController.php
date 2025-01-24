<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $volunteers = Volunteer::where('status', 'approved')->get();
        return view('frontend.about', compact('volunteers'));
    }
}
