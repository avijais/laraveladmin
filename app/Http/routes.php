<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
 return view('test.welcome');
});

Route::get('register', function () {
    return view('register.register');
});

Route::post('registerUser','Application\RegistrationController@registerUser');
Route::get('admin', ['uses' => 'Admin\LoginController@adminLogin', 'as' => 'admin']);
Route::post('admin/','Admin\LoginController@login');
Route::post('admin/loginApi','Admin\LoginController@loginApi');

Route::group(['prefix' => 'admin'], function(){
	Route::get('/dashboard', ['uses' => 'Admin\LoginController@dashboard', 'as' => 'admin/dashboard']);
	Route::get('/logout', ['uses' => 'Admin\LoginController@logout', 'as' => 'admin/logout']);
	Route::get('/usersList', 'Admin\UserController@usersList');
	Route::get('/fetchUsers', 'Admin\UserController@fetchUsers');
});

Route::post('register','Auth\AuthController@registerUser');



Route::get('test', 'TestController@index');


/*
|--------------------------------------------------------------------------|
| NOTES RELATED TO ROUTE : 
|--------------------------------------------------------------------------|
*/


/*

|--------------------------------------------------------------------------|
| 								[1]										   |
|--------------------------------------------------------------------------|

	=>	'as'	:	main purpose using 'as' only for  Redirect::route('admin');
					if you not write 'as' => 'admin' then Redirect::route('admin'); will not work
	 

|--------------------------------------------------------------------------|
| 								[2]										   |
|--------------------------------------------------------------------------|

	=>		We can return view from route like following :

			Route::get('admin/dashboard', function () {
			    return view('dashboard');
			});

|--------------------------------------------------------------------------|
| 								[3]										   |
|--------------------------------------------------------------------------|
	=>		For global constants in Laravel 5, I don't like calling Config for them. I define them in Route group like this:

			// global contants for all requests
			Route::group(['prefix' => ''], function() {
			    define('USER_ROLE_ADMIN','1');
			    define('USER_ROLE_ACCOUNT','2');
			});


*/