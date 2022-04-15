<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', 'App\Http\Controllers\TopicController@index')->name('zanbob.index');
Route::resource('topics', 'App\Http\Controllers\TopicController')->except(['index']);

Route::get('/indexadmin', 'App\Http\Controllers\TopicController@indexadmin')->name('pageadmin');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/comments/{topic}', 'App\Http\Controllers\commentController@store')->name('comments.store');

Route::post('/replycomment/{comment}', 'App\Http\Controllers\commentController@storeCommentReply')->name('comments.storeReply');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/private', function () {
        return 'Bonjour Admin';
    });
});
