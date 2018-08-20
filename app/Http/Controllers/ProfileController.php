<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $user->load('books');

        return view('users.show', compact('user'));
    }
}
