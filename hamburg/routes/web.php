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
    return view('pages.landing');
});

Route::get('/form', function() {
    return view('pages.emergency_form');
});

Route::get('/distresses', 'HomeController@distresses');
Route::get('/volunteers', 'HomeController@volunteers');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
