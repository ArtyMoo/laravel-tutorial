<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginPage()
    {
        return view('register.login');
    }

    public function logUserIn(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if( !auth()->attempt($credentials) ) {
            return back()->withErrors([
                'username' => 'The username or the password you provided might not be correct.',
            ])->onlyInput('username');
        }

        // regenerate the user's session to prevent session fixation
        $request->session()->regenerate();

        return redirect('/')->with('success', 'Welcome back!');
    }

    public function logOutUser(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Goodbye');
    }
}
