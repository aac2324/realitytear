<?php

namespace App\Http\Controllers;

use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::withCount(['reviews'])->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        $user = User::with(['reviews.event'])->findOrFail($id);
        return view('users.show', compact('user'));
    }
}
