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
    return view('welcome');
});

Route::get('/doctors','DoctorController@index');

Route::get('/doctor/{id}','DoctorController@show');

Route::get('/search-doctors','DoctorController@byName')->name('search-value');

Route::get('/search-hospitals','HospitalController@byName')->name('search-value');

Route::get('/search-services','ServiceController@byName')->name('search-value');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
