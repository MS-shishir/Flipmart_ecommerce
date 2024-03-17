<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* 
|--------------------------------------------------------------------------
| Backend Routes
|--------------------------------------------------------------------------
|
*/

Route::group(['prefix'=> 'Dashboard'], function () {
   Route::get('/dashboard', 'App\Http\Controllers\Backend\pagescontroller@index')->name('dashboard');

// Brand routes
Route::group(['prefix'=>'Brand'], function(){
   Route::get('/manage', 'App\Http\Controllers\Backend\BrandController@index')->name('Brand.manage');
   Route::get('/create', 'App\Http\Controllers\Backend\BrandController@create')->name('Brand.create');
   Route::post('/store', 'App\Http\Controllers\Backend\BrandController@store')->name('Brand.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BrandController@edit')->name('Brand.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\BrandController@update')->name('Brand.update');
   Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\BrandController@destroy')->name('Brand.destroy');
});

// Category route
Route::group(['prefix'=>'Category'], function(){
   Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->name('Category.manage');
   Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->name('Category.create');
   Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('Category.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('Category.edit');
   Route::post('/update/{id}','App\Http\Controllers\Backend\CategoryController@update')->name('Category.update');
   Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('Category.destroy');
});

// Product route
Route::group(['prefix'=>'Product'], function(){
   Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->name('Product.manage');
   Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->name('Product.create');
   Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->name('Product.store');
   Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@edit')->name('Product.edit');
   Route::post('/update/{id}', 'App\Http\Controllers\Backend\ProductController@update')->name('Product.update');
   Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\ProductController@destroy')->name('Product.destroy');
});



});
