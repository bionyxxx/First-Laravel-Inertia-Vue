<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Index', [
            'users' => \App\Models\User::orderByDesc('created_at')->get(),
        ]);
    }

    public function show(\App\Models\User $user)
    {
        return Inertia::render('User/Show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return Inertia::render('User/Edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string'],
        ]);

        $request->session()->forget('alert');

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? \Hash::make($request->password) : $user->password,
        ]);

        return \Redirect::back()->with('alert', [
            'type' => 'success',
            'message' => 'User updated successfully'
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return \Redirect::route('user.index')->with('alert', [
            'type' => 'success',
            'message' => 'User deleted successfully'
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'string', 'min:8']
        ]);

        \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ]);

        return \Redirect::route('user.index')->with('alert', [
            'type' => 'success',
            'message' => 'User created successfully'
        ]);
    }
}
