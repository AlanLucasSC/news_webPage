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
Route::get('/home', 'DashboardController@index')->name('home');
Auth::routes();


Route::get('/category/{id}/excluir', 'CategoryController@destroy')->name('category.delete');
Route::get('/news/{id}/excluir', 'NewsController@destroy')->name('news.delete');
Route::get('/acnuncio/{id}/excluir', 'CatalogController@destroy')->name('catalog.delete');

Route::get('/advertising/{id}/excluir', 'AdvertisingController@destroy')->name('advertising.delete');

Route::get('/news/{id}/mudar/{status}', 'NewsController@changeStatus')->name('news.status');

Route::get('/news/plus/view', 'NewsViewsController@plusView')->name('news.plus');

Route::get('/markdown', function () {
    return view('markdown');
});

Route::get('/getHtml', 'MarkdownController@markdownToHtml')->name('getHtml');
Route::post('/getHtml', 'MarkdownController@markdownToHtml')->name('getHtml');

Route::resources([
    
    'catalog' => 'CatalogController',
    'advertising' => 'AdvertisingController',
    'category' => 'CategoryController',
    'comment' => 'CommentController',
    'file' => 'FileController',
    'news' => 'NewsController',
]);

Route::get('/files/{filename}', function ($filename)
{
    // Add folder path here instead of storing in the database.
    $path = public_path('files') .'/'. $filename;

    if (!File::exists($path)) {
        abort(404);
    }

    $file = File::get($path);
    $type = File::mimeType($path);

    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::get('/categorias/{id}/{name}/{page?}','CategoryController@show')->name('category');
Route::get('/usuario/editar','ChangePasswordController@edit')->name('password.edit');
Route::put('/usuario/atualizar','ChangePasswordController@update')->name('password.update');


