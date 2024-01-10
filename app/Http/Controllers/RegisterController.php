<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // create the user
        $attributes = request()->validate([
            'name' => ['required', 'max:255', 'alpha'],
            'username' => ['required', 'max:255', 'min:3', 'unique:users,username'],
            'email' => ['required', 'max:255', 'unique:users,email'],
            'password' => ['required', 'max:255', 'min:7']
        ]);

        $attributes['password'] = bcrypt($attributes['password']);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created!');
    }

    public function logUserIn(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if(auth()->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/')->with('success', 'Welcome!');
        }

        return back()->withErrors([
            'username' => 'The username or the password you provided might not be correct.',
        ])->onlyInput('username');
    }

    public function logOutUser(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Goodbye');
    }
}
