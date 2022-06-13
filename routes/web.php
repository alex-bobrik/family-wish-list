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

Route::get('/lists', 'WishListController@index')->middleware('auth');
Route::post('/add-new-wish', 'WishListController@addNewWish');

Route::get('/register', [ 'as' => 'register', 'uses' => 'RegistrationController@create']);
Route::post('register', 'RegistrationController@store');

Route::get('/login', [ 'as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@store');
Route::get('/logout', [ 'as' => 'logout', 'uses' => 'SessionsController@destroy']);

Route::get('/wishes', 'WishListController@getUsersWishList')->name('getUsersWishList');

