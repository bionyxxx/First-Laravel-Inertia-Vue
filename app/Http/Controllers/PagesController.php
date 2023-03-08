<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class PagesController extends Controller
{
    public function index()
    {
        return Inertia::render('Home', [
            'title' => 'Home',
            'user' => [
                'name' => 'John Doe',
                'age' => 30,
            ]
        ]);
    }

    public function about()
    {
        return Inertia::render('About');
    }
}
