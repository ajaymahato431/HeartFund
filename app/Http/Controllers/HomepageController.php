<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::where('status', 'active')->get();
        return view('frontend.homepage', compact('campaigns'));
    }
}
