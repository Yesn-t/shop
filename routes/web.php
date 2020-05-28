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

Route::get('/', 'HomeController@home')->name('home');

// Route::get('/', 'HomeController@home', function () {
//     return view('home');
// });

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('departament', 'DepartamentController');

Route::get('/collection', 'HomeController@collection')->name('collection');

Route::group(['middleware' => ['auth', 'verified']], function () {  
    Route::resource('order', 'OrderController');
    Route::resource('departament', 'DepartamentController');
    Route::resource('category', 'CategoryController');
    Route::resource('product', 'ProductController');

    //Rutas para listado y carga de Files
    Route::get('file', function() {
        $files = App\File::with('product:id,name')->get();
        return view('files.fileIndex', compact('files'));
    });
    Route::get('file/form', function() {
        $products = App\Product::pluck('name','id');
        return view('files.fileForm', compact('products'));
    });

    Route::post('file/charge', 'FileController@upload')->name('file.upload');

    Route::get('file/{file}/charge', 'FileController@download')->name('file.download');

    Route::post('file/{file}/delete', 'FileController@delete')->name('file.delete');
});



