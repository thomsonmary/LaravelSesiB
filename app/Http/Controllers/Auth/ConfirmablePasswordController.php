<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
// use Illuminate\Auth\Access\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Facades\Gate;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): Response
    {
        return Inertia::render('Auth/ConfirmPassword');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        $level = $request->level;
        if ($level == 'admin') {
            // Define the gate for 'admin'
            Gate::define('Hanya_Admin', function () {
                // Check if the user has the 'admin' role
                return auth()->user()->level === 'admin';
            });
        
            // Check if the user passes the gate
            if (Gate::allows('Hanya_Admin')) {
                // Redirect to intended route for admin users
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
        
        elseif($level == 'user'){
            Gate::define('Hanya_User', function () {
                // Check if the user has the 'admin' role
                return auth()->user()->level === 'admin';
            });
        
            // Check if the user passes the gate
            if (Gate::allows('Hanya_User')) {
                // Redirect to intended route for admin users
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        }
    
    
    }
}
