<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Volunteer;
use Illuminate\Http\Request;
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
}
