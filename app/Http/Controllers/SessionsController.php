<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        if (!auth()->attempt(request(['username', 'password']))) {
            return back()->withErrors([
                'message' => 'The username or password is incorrect, please try again'
            ]);
        }

        return redirect()->to('/lists');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect()->to('/login');
    }
}
