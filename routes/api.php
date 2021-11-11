<?php

use App\Http\Controllers\PostContoller;
use App\Http\Controllers\SiteContoller;
use App\Http\Controllers\UserContoller;
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
    Route::get('/', [UserContoller::class, 'index'])->name('user.index');
    Route::get('/{user}', [UserContoller::class, 'show'])->name('user.show');
    Route::post('/', [UserContoller::class, 'store'])->name('user.store');
    Route::put('/{user}', [UserContoller::class, 'update'])->name('user.update');
    Route::delete('/{user}', [UserContoller::class, 'destroy'])->name('user.destroy');
    Route::post('subscribe', [UserContoller::class, 'subscribe'])->name('user.subscribe');
});

Route::prefix('site')->group(function () {
    Route::get('/', [SiteContoller::class, 'index'])->name('site.index');
    Route::get('/{site}', [SiteContoller::class, 'show'])->name('site.show');
    Route::post('/', [SiteContoller::class, 'store'])->name('site.store');
    Route::put('/{site}', [SiteContoller::class, 'update'])->name('site.update');
    Route::delete('/{site}', [SiteContoller::class, 'destroy'])->name('site.destroy');
});

Route::prefix('post')->group(function () {
    Route::get('/', [PostContoller::class, 'index'])->name('post.index');
    Route::get('/{post}', [PostContoller::class, 'show'])->name('post.show');
    Route::post('/', [PostContoller::class, 'store'])->name('post.store');
    Route::put('/{post}', [PostContoller::class, 'update'])->name('post.update');
    Route::delete('/{post}', [PostContoller::class, 'destroy'])->name('post.destroy');
});
