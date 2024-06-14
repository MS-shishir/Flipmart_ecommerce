<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\PagesController;
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



Route::get('/', function () {
   return view('frontend/pages/home');
});

//<-----FRONTEND------->

Route::get('/',[PagesController::class,'index'])->name('homepage');



//<------ BACKEND ------>

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['prefix' => 'Dashboard'], function () {
   Route::get('/dashboard', 'App\Http\Controllers\Backend\pagescontroller@index')->middleware(['auth', 'verified'])->name('dashboard');

   // Brand routes
   Route::group(['prefix' => 'Brand'], function () {
      Route::get('/manage', 'App\Http\Controllers\Backend\BrandController@index')->name('Brand.manage');
      Route::get('/create', 'App\Http\Controllers\Backend\BrandController@create')->name('Brand.create');
      Route::post('/store', 'App\Http\Controllers\Backend\BrandController@store')->name('Brand.store');
      Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BrandController@edit')->name('Brand.edit');
      Route::post('/update/{id}', 'App\Http\Controllers\Backend\BrandController@update')->name('Brand.update');
      Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\BrandController@destroy')->name('Brand.destroy');
   });

   // Category route
   Route::group(['prefix' => 'Category'], function () {
      Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->name('Category.manage');
      Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->name('Category.create');
      Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('Category.store');
      Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('Category.edit');
      Route::post('/update/{id}', 'App\Http\Controllers\Backend\CategoryController@update')->name('Category.update');
      Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('Category.destroy');
   });

   // Product route
   Route::group(['prefix' => 'Product'], function () {
      Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->name('Product.manage');
      Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->name('Product.create');
      Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->name('Product.store');
      Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@edit')->name('Product.edit');
      Route::post('/update/{id}', 'App\Http\Controllers\Backend\ProductController@update')->name('Product.update');
      Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\ProductController@destroy')->name('Product.destroy');
   });

   // Divisions route
   Route::group(['prefix' => 'Division'], function () {
      Route::get('/manage', 'App\Http\Controllers\Backend\DivisionController@index')->name('Division.manage');
      Route::get('/create', 'App\Http\Controllers\Backend\DivisionController@create')->name('Division.create');
      Route::post('/store', 'App\Http\Controllers\Backend\DivisionController@store')->name('Division.store');
      Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DivisionController@edit')->name('Division.edit');
      Route::post('/update/{id}', 'App\Http\Controllers\Backend\DivisionController@update')->name('Division.update');
      Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\DivisionController@destroy')->name('Division.destroy');
   });

   // Districts route
   Route::group(['prefix' => 'District'], function () {
      Route::get('/manage', 'App\Http\Controllers\Backend\DistrictController@index')->name('District.manage');
      Route::get('/create', 'App\Http\Controllers\Backend\DistrictController@create')->name('District.create');
      Route::post('/store', 'App\Http\Controllers\Backend\DistrictController@store')->name('District.store');
      Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DistrictController@edit')->name('District.edit');
      Route::post('/update/{id}', 'App\Http\Controllers\Backend\DistrictController@update')->name('District.update');
      Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\DistrictController@destroy')->name('District.destroy');
   });

   // Slider route
   Route::group(['prefix' => 'Slider'], function () {
      Route::get('/manage', 'App\Http\Controllers\Backend\SliderController@index')->name('Slider.manage');
      Route::get('/create', 'App\Http\Controllers\Backend\SliderController@create')->name('Slider.create');
      Route::post('/store', 'App\Http\Controllers\Backend\SliderController@store')->name('Slider.store');
      Route::get('/edit/{id}', 'App\Http\Controllers\Backend\SliderController@edit')->name('Slider.edit');
      Route::post('/update/{id}', 'App\Http\Controllers\Backend\SliderController@update')->name('Slider.update');
      Route::get('/destroy/{id}', 'App\Http\Controllers\Backend\SliderController@destroy')->name('Slider.destroy');
   });
});







Route::get('/admin_login', function () {
   return view('auth/login');
});

Route::middleware('auth')->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
   Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
