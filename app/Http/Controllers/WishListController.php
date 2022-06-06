<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {
        // create new WishList
        $listToSave = new WishList;
        $listToSave->wish_name = "test_name";
        $listToSave->description = "des";
        $listToSave->price = 0;
        $listToSave->save();

        $wishLists = WishList::all();

        return view('lists', ['lists' => $wishLists]);
    }
}
