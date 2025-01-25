<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        $volunteers = Volunteer::where('status', 'approved')->get();
        return view('frontend.about', compact('volunteers'));
    }

    public function causes()
    {
        $campaigns = Campaign::where('status', 'active')->paginate(6);
        return view('frontend.causes', compact('campaigns'));
    }

    public function donators()
    {
        $campaigns = Campaign::where('status', 'active')->paginate(6);
        return view('frontend.donators', compact('campaigns'));
    }

    public function gallery()
    {
        $campaigns = Campaign::where('status', 'active')->paginate(6);
        return view('frontend.gallery', compact('campaigns'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
