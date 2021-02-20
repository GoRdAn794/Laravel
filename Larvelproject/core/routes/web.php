<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Controllers;
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

Route::namespace('App\Http\Controllers')->group(function () {
    Route::get('/login', 'logincontroller@show_login_form')->name('login');
    Route::post('/login', 'logincontroller@process_login')->name('login');
    Route::get('/register', 'logincontroller@show_signup_form')->name('register');
    Route::post('/register', 'logincontroller@process_signup');
    Route::get('/logout', 'logincontroller@logout')->name('logout');
    Route::get('/user', 'logincontroller@userdashboard')->name('userdashboard');
    Route::get('/mcp', 'mcpcontroller@mcp_show_login')->name('showadmin');
    Route::post('/mcp', 'mcpcontroller@process_mcp')->name('mcplogin');
    Route::get('/admin', 'mcpcontroller@admindashboard')->name('admindashboard');
    Route::get('/mcplogout', 'mcpcontroller@logout')->name('logoutmcp');
    Route::post('/product', 'mcpcontroller@showproducts')->name('showproduct');
    Route::post('/addproduct', 'mcpcontroller@addproducts')->name('addproduct');
    Route::post('/deleteproduct', 'mcpcontroller@deleteproducts')->name('deleteproduct');
    Route::post('/editproduct', 'mcpcontroller@updateproducts')->name('editproduct');
    Route::post('/editproductrecord', 'mcpcontroller@editproductrecord')->name('updateproduct');
    Route::get('/shownames', 'mcpcontroller@shownames')->name('shownames');
});
