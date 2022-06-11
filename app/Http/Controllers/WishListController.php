<?php

namespace App\Http\Controllers;

use App\Models\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $firstTable = WishList::where('table_number', 0)->get();
        $secondTable = WishList::where('table_number', 1)->get();

        return view('lists', [
            'firstTable' => $firstTable,
            'secondTable' => $secondTable
        ]);
    }

    public function addNewWish(Request $request)
    {
        $newWish = new WishList();

        $newWish->table_number = $request->table_number;
        $newWish->wish_name = $request->wish_name;
        $newWish->description = $request->description;
        $newWish->price = $request->price;
        $newWish->link = $request->link;
        $newWish->save();

        return redirect('lists');
    }
}
