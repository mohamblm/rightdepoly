<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;


class ProfileController extends Controller
{
    public function index()
{
    return view('profile.profile', ['section' => 'settings']); // Default section
}


    public function section(Request $request,$section)
    {
        $validSections = ['historique', 'edite', 'messages'];

        if (!in_array($section, $validSections)) {
            abort(404);
        }

        
        return view('profile.profile', [
            'section' => $section,
            'user' => $request->user(),
        ]);
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.partials.edit', [

            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(Request $request): RedirectResponse
{
    $user = Auth::user();

    // Validate input
    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
        'nom' => ['nullable', 'string', 'max:255'],
        'prenom' => ['nullable', 'string', 'max:255'],
        'phone' => ['nullable', 'string', 'max:20'],
        'status' => ['required', 'in:individuel,entreprise'],
        'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
    ]);

    // Update user data
    $user->fill($validated);

    // Handle profile image upload
    if ($request->hasFile('image')) {
        // Delete old image if exists
        if ($user->image) {
            Storage::delete('public/profile_images/' . $user->image);
        }

        // Store new image
        $imagePath = $request->file('image')->store('profile_images', 'public');
        $user->image = $imagePath;
    }

    // Reset email verification if email is changed
    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    $user->save();
    return Redirect::route('profile.section', 'messages')
    ->with('status', 'profile-updated')
    ->with('success', 'Le profil a été enregistré avec succès.');
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
