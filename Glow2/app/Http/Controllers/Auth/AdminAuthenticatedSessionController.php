<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticatedSessionController extends Controller
{
    /**
     * Handle admin login request.
     */
    public function store(Request $request)
    {
        // Validate login credentials
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Check if the user is an admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect to dashboard
            }

            // If not admin, log out and return error
            Auth::logout();

            return back()->withErrors([
                'email' => 'Unauthorized access.',
            ]);
        }

        // If login fails, return error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Logout an admin user.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
