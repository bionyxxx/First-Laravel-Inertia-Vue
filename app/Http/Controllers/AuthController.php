<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AuthController extends Controller
{
    public function login()
    {
        return Inertia::render('Auth/Login');
    }

    public function _login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (\Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('index'));
        } else {
            return redirect()->back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function register()
    {
        return Inertia::render('Auth/Register');
    }

    public function _register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8']
        ]);

        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        auth()->loginUsingId($user->id);

        $request->session()->regenerate();

        return redirect()->intended(route('index'));
    }

    public function logout()
    {
        auth()->logout();
        return \Redirect::route('login');
    }

}
