<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $wishes = WishList::where('user_id', $user->id)->get();

        return view('lists', [
            'wishes' => $wishes
        ]);
    }

    public function addNewWish(Request $request)
    {
        $newWish = new WishList();

        $newWish->user_id = $request->user()->id;
        $newWish->wish_name = $request->wish_name;
        $newWish->description = $request->description;
        $newWish->price = $request->price;
        $newWish->link = $request->link;
        $newWish->save();

        return redirect('lists');
    }
}
