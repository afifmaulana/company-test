<?php

use Illuminate\Support\Facades\Route;

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

//Route User
Route::get('/user-login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('/user-login', 'Auth\LoginController@login')->name('user.login.submit');
Route::post('/user-register', 'Auth\RegisterController@store')->name('user.register.submit');
Route::get('/user-logout', 'Auth\LoginController@logout')->name('user.logout');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');


Route::group(['prefix' => 'companies'], function (){
    Route::get('index','CompaniesController@index')->name('companies.index');
    Route::get('create','CompaniesController@create')->name('companies.create');
    Route::post('store','CompaniesController@store')->name('companies.store');
    Route::get('edit/{id}','CompaniesController@edit')->name('companies.edit');
    Route::patch('edit/{id}/update','CompaniesController@update')->name('companies.update');
    Route::get('destroy/{id}','CompaniesController@destroy')->name('companies.destroy');
});

Route::group(['prefix' => 'employees'], function (){
    Route::get('index','EmployeesController@index')->name('employees.index');
    Route::get('create','EmployeesController@create')->name('employees.create');
    Route::post('store','EmployeesController@store')->name('employees.store');
    Route::get('edit/{id}','EmployeesController@edit')->name('employees.edit');
    Route::patch('edit/{id}/update','EmployeesController@update')->name('employees.update');
    Route::get('destroy/{id}','EmployeesController@destroy')->name('employees.destroy');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
