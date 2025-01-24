<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use App\Models\Donation;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::where('status', 'active')->get();
        $volunteers = Volunteer::where('status', 'approved')->get();
        $topDonors = User::withSum('donations', 'amount')
            ->orderBy('donations_sum_amount', 'desc')
            ->take(2)
            ->get();
        return view('frontend.homepage', compact('campaigns', 'volunteers', 'topDonors'));
    }
}
