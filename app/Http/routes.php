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

// Route::post('register','Admin\LoginController@registerUser');

// Route::get('admin/dashboard', function () {
//     return view('admin_template');
// });

// Route::get('admin', function () {
//     return view('admin/login');
// });
Route::get('admin', ['uses' => 'Admin\LoginController@adminLogin', 'as' => 'admin']);
Route::post('admin','Admin\LoginController@login');
Route::post('register','Auth\AuthController@registerUser');

// Route::get('admin/dashboard', function () {
//     return view('dashboard');
// });

Route::get('admin/dashboard', ['uses' => 'Admin\LoginController@dashboard', 'as' => 'admin/dashboard']);
// Route::get('admin/dashboard','Admin\LoginController@dashboard');

Route::get('admin/logout', ['uses' => 'Admin\LoginController@logout', 'as' => 'admin/logout']);
// Route::get('admin/logout', function () {
//     return view('admin/login');
// });

Route::get('getAllUsers', 'Admin\UserManagement@getAllUsers');



Route::get('test', 'TestController@index');
