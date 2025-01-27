<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;


class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update the User model
        $user->fill($request->only('name', 'email'));

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Update the UserDetail model
        $userDetails = $user->userDetails ?? new UserDetail();
        $userDetails->fill($request->only(['phone', 'address', 'country', 'blood_group']));

        if ($request->hasFile('profile_img')) {
            // Handle file upload
            $profileImgPath = $request->file('profile_img')->store('profile_images', 'public');
            $userDetails->profile_img = $profileImgPath;
        }


        if ($user->userDetails()->save($userDetails)) {
            Alert::success('Profile Updated', 'Your has been updated successfully!');
        }

        return Redirect::route('dashboard');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
