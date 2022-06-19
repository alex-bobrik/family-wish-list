<?php

namespace App\Http\Controllers;

use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'username' => 'required|unique:users,username',
        ]);

        $user = User::create(request(['username']));

        auth()->login($user);

        return redirect()->to('/lists');
    }
}
