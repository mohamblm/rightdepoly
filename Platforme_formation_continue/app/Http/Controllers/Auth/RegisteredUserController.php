<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Events\NewNotification;
use App\Notifications\NewUserRegistered;
// use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Notifications\Notification;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        // // Find all admins (assuming 'admin' is stored in the 'role' column)
        // Store notification in the database

        // Broadcast the event
        event(new NewUserRegisteredEvent($notification));

        $admins = User::where('role', 'admin')->get();

        // // Notify all admins
        Notification::send($admins, new NewUserRegistered($user));
        // event(new NewNotification($user));
        event(new Registered($user));

        Auth::login($user);

        return redirect(route('welcome', absolute: false));
    }
    
}
