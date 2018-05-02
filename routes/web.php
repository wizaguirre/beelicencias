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
    return view('auth.login');
});

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

// // Password Reset Routes...
// Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

//Route::get('/home', 'HomeController@index')->name('home');

//USUARIOS
Route::get('/usuarios', 'UserController@index');
Route::post('/usuarios', 'UserController@store');
Route::get('/usuario/{id}', 'UserController@edit');
Route::post('/usuario/{id}', 'UserController@update');
Route::get('/usuario/{id}/eliminar', 'UserController@delete');

//CLIENTES	
Route::get('/clientes','CustomerController@index');
Route::post('/clientes','CustomerController@store');
Route::post('/cliente/{id}','CustomerController@update');
Route::get('/cliente/{id}','CustomerController@edit');
Route::get('/cliente/{id}/eliminar','CustomerController@destroy');

//SOFTWARE
Route::get('/software','SoftwareController@index');
Route::post('/software','SoftwareController@store');
Route::post('/software/{id}','SoftwareController@update');
Route::get('/software/{id}','SoftwareController@edit');
Route::get('/software/{id}/eliminar','SoftwareController@destroy');

//LICENCIAS
Route::get('/licencias','LicenceController@index');
Route::post('/licencias','LicenceController@store');
Route::post('/licencia/{id}','LicenceController@update');
Route::get('/licencia/{id}','LicenceController@edit');
Route::get('/licencia/{id}/eliminar','LicenceController@destroy');

//TERMINALES
// Ruta que muestra las terminales por licencia
Route::get('/licencia/{id}/terminales','TerminalController@index');
Route::post('/licencia/{id}/terminales','TerminalController@store');
Route::post('/terminal/{id}','TerminalController@update');
Route::get('/terminal/{id}','TerminalController@edit');
Route::get('/terminal/{id}/eliminar','TerminalController@destroy');

