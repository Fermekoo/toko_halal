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
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('admin/barang','BarangController@index')->middleware('auth')->name('barang');
Route::post('admin/barang','BarangController@create')->middleware('auth')->name('save_barang');
Route::put('admin/barang','BarangController@update')->middleware('auth')->name('update_barang');
Route::delete('admin/barang','BarangController@delete')->middleware('auth')->name('delete_barang');
