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
    return view('home');
});

// Route::get('/admin/profile',function() {
// 	return view('admin/users/lists');
// });



Route::group(['middleware' => ['web']], function() {

	Auth::routes();
	Route::get('/home', 'HomeController@index');
	Route::get('api/city','ApiController@get_city');
	Route::get('api/category','ApiController@get_Category');
  
//   Route::get('/', function () {
//   return view('auth.login');
// });

	});

Route::group(['middleware' => 'admin'], function() {

  Route::resource('admin/city', 'CityController');
  Route::resource('admin/salary','SalaryController');
  Route::resource('admin/category','CategoryController');
  Route::resource('admin/company','CompanyController');
  Route::resource('admin/type','TypeController');
  Route::resource('admin/job','JobController');
  Route::resource('admin','UserController');
  
});

