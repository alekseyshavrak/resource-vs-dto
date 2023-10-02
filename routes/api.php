<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

# Post
Route::group(['as' => 'post.'], function () {
    Route::get('posts')
        ->name('list')
        ->uses(\App\Http\Controllers\Post\ListController::class);

    Route::get('posts/{post}/show')
        ->name('detail')
        ->uses(\App\Http\Controllers\Post\ShowController::class);
});
