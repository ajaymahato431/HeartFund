<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Donation;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class FrontendCrudController extends Controller
{
    public function contactMessage(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'form_name' => 'required|string|max:255',
            'form_email' => 'required|email',
            'form_subject' => 'required|string|max:255',
            'form_phone' => 'required|string|max:20',
            'form_message' => 'required|string',
        ]);

        $message = ContactMessage::create([
            'name' => $request->form_name,
            'email' => $request->form_email,
            'subject' => $request->form_subject,
            'phone' => $request->form_phone,
            'message' => $request->form_message,
        ]);

        if ($message) {
            Alert::success('Message Sent', 'Your message has been sent successfully!');
        }

        return redirect()->back();
    }

    public function volunteerStore(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:volunteers,email',
            'phone' => 'nullable|string|max:20|unique:volunteers,phone',
            'address' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:100',
            'blood_group' => 'nullable|string|max:5',
            'profile_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'facebook' => 'nullable|url',
            'insta' => 'nullable|url',
            'linkedin' => 'nullable|url',
        ]);

        // Handle file upload for profile image
        if ($request->hasFile('profile_img')) {
            $profileImgPath = $request->file('profile_img')->store('volunteers', 'public');
        } else {
            $profileImgPath = null;
        }

        // Save the data to the database
        $volunteer = Volunteer::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'blood_group' => $request->blood_group,
            'profile_img' => $profileImgPath,
            'facebook' => $request->facebook,
            'insta' => $request->insta,
            'linkedin' => $request->linkedin,
        ]);

        if ($volunteer) {
            Alert::success('Form Sent', 'Your Form has been submitted successfully!');
        }

        return redirect()->back();
    }

    public function donationStore(Request $request)
    {
        // Check if the user is logged in
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to make a donation.');
        }

        // Validate the request
        $validatedData = $request->validate([
            'campaign_id' => 'required|exists:campaigns,id',
            'user_id' => 'required|exists:users,id',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|in:card,bank_transfer,cash,esewa,khalti,imepay',
            'transaction_proof' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'donor_message' => 'nullable|string|max:1000',
        ]);

        // Handle file upload if a proof is provided
        if ($request->hasFile('transaction_proof')) {
            $file = $request->file('transaction_proof');
            $validatedData['transaction_proof'] = $file->store('transaction_proofs', 'public'); // Store file in the public disk
        }

        // Set default payment status
        $validatedData['payment_status'] = 'pending';

        // Create the donation record
        $donation = Donation::create($validatedData);

        if ($donation) {
            Alert::success('Donation Sent', 'Thank you for your donation! Your transaction is under review.');
        }

        return redirect()->back();
    }
}
