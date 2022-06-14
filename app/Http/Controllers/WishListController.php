<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wishes = WishList::where('user_id', $user->id)->get();
        $users= User::all();

        return view('lists', [
            'wishes' => $wishes,
            'users' => $users,
        ]);
    }

    public function updateWish(Request $request)
    {
        $wish_id = $request->wish_id;

        if (!$wish_id) {
            // Add new wish
            $new_wish = new WishList();

            $new_wish->wish_name = $request->wish_name;
            $new_wish->user_id = $request->user()->id;
            $new_wish->description = $request->description;
            $new_wish->price = $request->price;
            $new_wish->link = $request->link;
            $new_wish->save();
        }
        else {
            // Edit existing wish
            WishList::where('id', $wish_id)->update([
                'wish_name' => $request->wish_name,
                'description' => $request->description,
                'price' => $request->price,
                'link' => $request->link,
            ]);
        }

        return redirect('lists');
    }

    public function deleteWish(Request $request)
    {
        $delete_wish_id = $request->delete_wish_id;

        if (!$delete_wish_id)
            return response()->json(['message' => 'error message'], 500);

        WishList::where('id', $delete_wish_id)->delete();

        return redirect('lists');
    }

    public function getUsersWishList(Request $request)
    {
        $user_id = $request->input('userId');
        $wishes = WishList::where('user_id', $user_id)->get();

        return response()->json($wishes);
    }
}
