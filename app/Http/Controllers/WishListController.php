<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {
        $wishLists = WishList::all();

        return view('lists', ['lists' => $wishLists]);
    }

    public function addNewWish(Request $request)
    {
        $newWish = new WishList();

        $newWish->wish_name = $request->wish_name;
        $newWish->description = $request->description;
        $newWish->price = $request->price;
        $newWish->link = $request->link;
        $newWish->save();

        return redirect('lists');
    }
}
