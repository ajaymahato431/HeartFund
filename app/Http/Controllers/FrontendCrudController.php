<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

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

        // Optionally save the message to the database
        $message = ContactMessage::create([
            'name' => $request->form_name,
            'email' => $request->form_email,
            'subject' => $request->form_subject,
            'phone' => $request->form_phone,
            'message' => $request->form_message,
        ]);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
