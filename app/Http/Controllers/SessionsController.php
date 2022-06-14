<?php

namespace App\Http\Controllers;

use App\User;
use Doctrine\DBAL\Exception;
use Illuminate\Http\Request;

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
            return 404;

        auth()->login($user);

        return redirect()->to('/lists');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/login');
    }
}
