<?php

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
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource("news","newcontroller"); // $this->middleware('auth')->except(['index','show']);
Route::resource("commments","commentcontroller");
Route::resource("images","imagecontroller");
Route::resources([
    'advertising' => 'PhotoController',
    'category' => 'PostController',
    'comment' => 'PostController',
    'image' => 'PostController',
    'news' => 'PostController',
]);
