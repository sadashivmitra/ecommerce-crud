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
    return view('admin.index');
})->name('admin.index');


Route::post('product/image-upload/{productId}','ProductsController@uploadImages');
Route::resource('product','ProductsController');
Route::resource('category','CategoriesController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/image-processing', 'ImageProcessingController@create');
Route::post('/image-processing', 'ImageProcessingController@store');
Route::get('/{image}', 'ImageConImageProcessingControllertroller@show');
