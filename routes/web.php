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
})->middleware('guest');

// hanya untuk tamu yg belum auth
Route::get('/login', 'LoginController@getLogin')->middleware('guest');
Route::post('/login', 'LoginController@postLogin');
Route::post('/loginmhs', 'LoginController@postLoginMhs');
Route::get('/logout', 'LoginController@logout')->name('logout');
Route::get('/signout', 'LoginController@signout')->name('signout');


Route::prefix('admin')->group(function () {
	Route::get('dashboard', 'AdminController@index')->name('admin.dashboard')
	->middleware('auth:admin');
	Route::get('input/jurusan', 'AdminController@inputjurusan')->name('in.jurusan')
	->middleware('auth:admin');
	Route::get('input/panitia', 'AdminController@inputpanita')->name('in.panitia')
	->middleware('auth:admin');


	//back end
	Route::post('inputjurusan', 'AdminActionsController@addjurusan')->name('input.jurusan')
	->middleware('auth:admin');
	Route::post('inputpanitia', 'AdminActionsController@addpanitia')->name('input.panitia')
	->middleware('auth:admin');

});

Route::get('/panitia/dashboard', function() {
  return view('panitia.home');
})->middleware('auth:panitia');

Route::get('/dashboard', function() {
  return view('home');
})->middleware('auth:mahasiswa');

