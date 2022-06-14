<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/lists', 'WishListController@index');

    // Update wish
    Route::post('/update-wish', 'WishListController@updateWish')->name('update-wish');
});

Route::get('/wishes', 'WishListController@getUsersWishList')->name('getUsersWishList');


// Sessions
Route::get('/register', [ 'as' => 'register', 'uses' => 'RegistrationController@create']);
Route::post('register', 'RegistrationController@store');

Route::get('/login', [ 'as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@store');

Route::get('/logout', [ 'as' => 'logout', 'uses' => 'SessionsController@destroy']);


