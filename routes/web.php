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

Route::get("/", 'UserController@index')->name('users.index');
Route::get("/admin", 'UserController@show')->name('users.admin');
Route::delete('/user/{user}', 'UserController@destroy')->name('users.destroy');
Route::post('/users', 'UserController@store')->name('users.store');
Route::get('/user/create', 'UserController@create')->name('users.create');
Route::get('/user/{user}','UserController@edit')->name('users.edit');
Route::patch('/user/{user}', 'UserController@update')->name('users.update');
Route::delete('/admin/checkbox', 'UserController@checkbox')->name('admin.checkbox');
