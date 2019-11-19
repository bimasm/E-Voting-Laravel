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
	//input data
	Route::get('input/jurusan', 'AdminController@inputjurusan')->name('in.jurusan')
	->middleware('auth:admin');
	Route::get('input/panitia', 'AdminController@inputpanita')->name('in.panitia')
	->middleware('auth:admin');
	//show data
	Route::get('data/jurusan', 'AdminController@datajurusan')->name('data.jurusan')
	->middleware('auth:admin');
	Route::get('data/panitia', 'AdminController@datapanitia')->name('data.panitia')
	->middleware('auth:admin');
	Route::get('data/calon', 'AdminController@datacalon')->name('data.calon')
	->middleware('auth:admin');
	Route::get('data/mahasiswa', 'AdminController@datamahasiswa')->name('data.mahasiswa')
	->middleware('auth:admin');


	//back end
	Route::post('inputjurusan', 'AdminActionsController@addjurusan')->name('input.jurusan')
	->middleware('auth:admin');
	Route::post('inputpanitia', 'AdminActionsController@addpanitia')->name('input.panitia')
	->middleware('auth:admin');
	//edit
	Route::post('editjurusan', 'AdminActionsController@editjurusan')->name('edit.jurusan')
	->middleware('auth:admin');
	Route::post('editpanitia', 'AdminActionsController@editpanitia')->name('edit.panitia')
	->middleware('auth:admin');

});

Route::get('/panitia/dashboard', function() {
  return view('panitia.home');
})->middleware('auth:panitia');

Route::get('/dashboard', function() {
  return view('home');
})->middleware('auth:mahasiswa');

