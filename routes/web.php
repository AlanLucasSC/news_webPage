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

Route::get('/', 'IndexController@index')->name('index');
Route::get('/home', 'NewsController@index');
Route::get('/markdown', function () {
    return view('markdown');
});

Auth::routes();

Route::resources([
    'advertising' => 'AdvertisingController',
    'category' => 'CategoryController',
    'comment' => 'CommentController',
    'image' => 'ImageController',
    'news' => 'NewsController',
]);

Route::get('/{name}/{page}','CategoryController@show')->name('category');