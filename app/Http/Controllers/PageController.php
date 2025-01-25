<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Gallery;
use App\Models\User;
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
        $donators = User::latest()->with('donations')->paginate(12);
        return view('frontend.donators', compact('donators'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('frontend.gallery', compact('galleries'));
    }

    public function contact()
    {
        return view('frontend.contact');
    }

    public function volunteer()
    {
        return view('frontend.volunteer');
    }
}
