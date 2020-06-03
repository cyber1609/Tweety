<?php

use Illuminate\Support\Facades\Auth;
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


Route::middleware('auth')->group(function () {
    Route::get('/tweets', 'TweetController@index')->name('home');
    Route::post('/tweets', 'TweetController@store')->name('tweet');

    Route::post('/tweets/{tweet}/like', 'TweetLikesController@store')->name('tweet.like');
    Route::delete('/tweets/{tweet}/like', 'TweetLikesController@destroy')->name('tweet.dislike');


    Route::post('/profiles/{user:username}/follow', 'FollowsController@store')->name('follow');

    Route::get('/profiles/{user:username}/edit', 'ProfileController@edit')->name('profile.edit')->middleware('can:edit,user');
    Route::patch('/profiles/{user:username}', 'ProfileController@update')->name('profile.update')->middleware('can:edit,user');

    Route::get('/explore', 'ExploreController')->name('explore');
});

Route::get('/profiles/{user:username}', 'ProfileController@show')->name('profile.show');





Auth::routes();



