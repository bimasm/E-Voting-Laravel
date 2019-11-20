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


	//input
	Route::post('inputjurusan', 'AdminActionsController@addjurusan')->name('input.jurusan')
	->middleware('auth:admin');
	Route::post('inputpanitia', 'AdminActionsController@addpanitia')->name('input.panitia')
	->middleware('auth:admin');


	//edit
	Route::post('editjurusan', 'AdminActionsController@editjurusan')->name('edit.jurusan')
	->middleware('auth:admin');
	Route::post('editpanitia', 'AdminActionsController@editpanitia')->name('edit.panitia')
	->middleware('auth:admin');
	Route::post('editcalon', 'AdminActionsController@editcalon')->name('edit.calon')
	->middleware('auth:admin');
	Route::get('resetmahasiswa/{id}', 'AdminActionsController@reset')->name('edit.mhs')
	->middleware('auth:admin');
	Route::get('statuspanitia/{id}', 'AdminActionsController@statuspanitia')->name('stat.pnt')
	->middleware('auth:admin');
	Route::get('statusjurusan/{id}', 'AdminActionsController@statusjurusan')->name('stat.jrs')
	->middleware('auth:admin');


	//delete
	Route::get('hapusjurusan/{id}', 'AdminActionsController@hapusjurusan')->name('hapus.jurusan')
	->middleware('auth:admin');
	Route::get('hapuspanitia/{id}', 'AdminActionsController@hapuspanitia')->name('hapus.panitia')
	->middleware('auth:admin');
	Route::get('hapuscalon/{id}', 'AdminActionsController@hapuscalon')->name('hapus.calon')
	->middleware('auth:admin');
	Route::get('hapusmahasiswa/{id}', 'AdminActionsController@hapusmahasiswa')->name('hapus.mahasiswa')
	->middleware('auth:admin');

});


Route::prefix('panitia')->group(function () {
	Route::get('dashboard', 'PanitiaController@index')->name('panitia.dashboard')
	->middleware('auth:panitia');


	//show data
	Route::get('data/calon', 'PanitiaController@datacalon')->name('show.calon')
	->middleware('auth:panitia');
	Route::get('data/mahasiswa', 'PanitiaController@datamahasiswa')->name('show.mahasiswa')
	->middleware('auth:panitia');


	//input
	Route::post('inputcalon', 'PanitiaActionsController@addcalon')->name('input.calon')
	->middleware('auth:panitia');
	Route::post('inputmahasiswa', 'PanitiaActionsController@addmahasiswa')->name('input.mahasiswa')
	->middleware('auth:panitia');


	//edit
	Route::get('activate/{id}', 'PanitiaActionsController@activate')->name('activate')
	->middleware('auth:panitia');
	Route::get('activatecalon/{id}', 'PanitiaActionsController@activatecalon')->name('activate')
	->middleware('auth:panitia');
	Route::post('editcalon', 'PanitiaActionsController@editcalon')->name('editt.calon')
	->middleware('auth:panitia');


	//delete
	Route::get('hapuscalon/{id}', 'PanitiaActionsController@hapuscalon')->name('del.calon')
	->middleware('auth:panitia');

});

Route::get('/dashboard', function() {
  return view('home');
})->middleware('auth:mahasiswa');

