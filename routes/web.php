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

Route::group(['middleware' => 'auth'], function () {
    Route::redirect('/', '/lists');
    Route::get('/lists', 'WishListController@index')->name('lists');

    // Update wish
    Route::post('/update-wish', 'WishListController@updateWish')->name('update-wish');
    // Delete wish
    Route::post('/delete-wish', 'WishListController@deleteWish')->name('delete-wish');

    // Profile page
    Route::get('/profile', 'ProfileController@index')->name('profile');
    // Update username
    Route::post('profile/update-username', 'ProfileController@updateUsername')->name('updateUsername');
});

Route::get('/wishes', 'WishListController@getUsersWishList')->name('getUsersWishList');

// Sessions
Route::get('/register', [ 'as' => 'register', 'uses' => 'RegistrationController@create']);
Route::post('register', 'RegistrationController@store');

Route::get('/login', [ 'as' => 'login', 'uses' => 'SessionsController@create']);
Route::post('/login', 'SessionsController@store');

Route::get('/logout', [ 'as' => 'logout', 'uses' => 'SessionsController@destroy']);


