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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('register', function () {
    return view('register');
});

Route::post('registerUser','Application\RegistrationController@registerUser');

// Route::post('register','Admin\LoginController@registerUser');

Route::get('admin/dashboard', function () {
    return view('admin_template');
});

Route::get('admin/logout', function () {
    return view('admin/login');
});

Route::get('admin', function () {
    return view('admin/login');
});

Route::post('admin/login','Admin\LoginController@login');
Route::post('register','Auth\AuthController@registerUser');

Route::get('test', 'TestController@index');