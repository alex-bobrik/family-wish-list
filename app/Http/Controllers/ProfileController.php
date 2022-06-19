<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function updateUsername(Request $request)
    {
        $this->validate($request, [
            'new_profile_name' => 'required|unique:users,username',
        ]);

        $id = Auth::id();
        User::where('id', $id)->update(['username' => $request->new_profile_name]);

        return redirect()->to('/lists');
    }
}
