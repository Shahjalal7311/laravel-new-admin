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

Route::get('/', 'HomeController@index')->name('top');

//Route Protect
Auth::routes();

//admin user middleware
Route::get('logout', '\App\Http\Controllers\Admin\Auth\LoginController@logout');
Route::group(['prefix'=>'admin','namespace'=>'Admin'], function(){
	//Admin Login Url
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::post('logout', 'Auth\LoginController@logout')->name('logout');
	Route::group( ['middleware' => ['auth:web']], function() {
		Route::get('dashboard', 'DashboardController@index')->name('dashboard');
		//Dropzone file return route
		Route::post('dropzone/store', ['as'=>'dropzone.admin_store','uses'=>'DropZoneController@storeMedia']);
		Route::resource('users', 'UserController');
		Route::resource('roles', 'RoleController');
		Route::resource('perosnal-informations', 'PerosnalInformationsController');
		Route::get('/password_change', 'UserController@password_change')->name('password_change');
	    Route::post('/password_update', 'UserController@postCredentials')->name('password_update');
	});
});


