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

Auth::routes();


Route::post('/follow/{user}', 'FollowsController@store');

// Instead of by primary key, laravel 7 can find a model by
// a different attribute and return it or fail.
Route::get('/{user:username}', 'ProfilesController@index')->name('profile.show');

Route::get('/{user:username}/edit', 'ProfilesController@edit')->name('profile.edit');

Route::patch('/{user:username}', 'ProfilesController@update')->name('profile.update');

Route::get('/', 'PostsController@index');

Route::get('/p/create', 'PostsController@create');

// See RouteServiceProvider@boot for details about this model binding.
Route::get('/p/{post}', 'PostsController@show');

Route::post('/p', 'PostsController@store');

Route::get('/mail', function () {
    return new App\Mail\NewUserWelcomeMail();
});
