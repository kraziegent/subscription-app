<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('user')->group(function () {
    Route::get('/', 'UserController@index')->name('user.index');
    Route::get('/{user}', 'UserController@show')->name('user.show');
    Route::post('/', 'UserController@store')->name('user.store');
    Route::put('/{user}', 'UserController@update')->name('user.update');
    Route::delete('/{user}', 'UserController@destroy')->name('user.destroy');
    Route::post('subscribe/{site}', 'UserController@subscribe')->name('user.subscribe');
});

Route::prefix('site')->group(function () {
    Route::get('/', 'SiteController@index')->name('site.index');
    Route::get('/{site}', 'SiteController@show')->name('site.show');
    Route::post('/', 'SiteController@store')->name('site.store');
    Route::put('/{site}', 'SiteController@update')->name('site.update');
    Route::delete('/{site}', 'SiteController@destroy')->name('site.destroy');
});

Route::prefix('post')->group(function () {
    Route::get('/', 'PostController@index')->name('post.index');
    Route::get('/{post}', 'PostController@show')->name('post.show');
    Route::post('/{site}', 'PostController@store')->name('post.store');
    Route::put('/{post}', 'PostController@update')->name('post.update');
    Route::delete('/{post}', 'PostController@destroy')->name('post.destroy');
});
