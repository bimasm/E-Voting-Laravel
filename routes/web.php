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
    return view('login');
});

// hanya untuk tamu yg belum auth
Route::get('/login', 'LoginController@getLogin')->middleware('guest');
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@logout');;

Route::get('/admin/dashboard', function() {
  return view('admin.home');
})->middleware('auth:admin');

Route::get('/panitia/dashboard', function() {
  return view('panitia.home');
})->middleware('auth:panitia');

Route::get('/timses/dashboard', function() {
  return view('timses.home');
})->middleware('auth:timses');

