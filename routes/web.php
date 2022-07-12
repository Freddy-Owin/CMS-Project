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

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::get('/register', 'AdminController@register')->name('register');
    Route::get('/login', 'AdminController@showAdminLoginForm')->name('admin.login');
    Route::post('/login', 'AdminController@adminLogin')->name('admin.login');
    Route::get('/logout', 'AdminController@adminLogout')->name('admin.logout');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/category/{category}', 'HomeController@getProductByCategory')->name("category.product");
Route::get('/home/product/{product}', 'HomeController@getDetailByProduct')->name("product.detail");


