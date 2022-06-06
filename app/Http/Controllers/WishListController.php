<?php

namespace App\Http\Controllers;

use App\WishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function index()
    {
        $wishLists = WishList::all();

        return view('lists', ['lists' => $wishLists]);
    }
}
