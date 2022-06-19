<?php

namespace App\Http\Controllers;

use App\User;

class SessionsController extends Controller
{
    public function create()
    {
        $usernames = User::all()->pluck('username');

        return view('sessions.create', [
            'usernames' => $usernames,
        ]);
    }

    public function store()
    {
        $user = User::where('username', \request(['username']))->first();
        if (!$user)
            return response()->json(['message' => 'User is not found.'], 404);

        auth()->login($user);

        return redirect()->to('/lists');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/login');
    }
}
