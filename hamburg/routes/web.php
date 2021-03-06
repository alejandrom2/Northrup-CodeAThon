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

Route::get('/', 'HomeController@index');

Route::get('/form', 'HomeController@form');
//     $current_location = [
//         'lat' => 33.891992,
//         'lng' => -118.373088
//     ];
//     return view('pages.emergency_form', compact('current_location'));
// });

// Route::get('/volunteer', function() {

//     $current_location = [
//         'lat' => 33.891992,
//         'lng' => -118.373088
//     ];

//     return view('pages.volunteer', compact('current_location'));
// });

Route::post('/formTest','EmergencyCallForm@postForm');


Route::get('/distresses', 'HomeController@distresses');
Route::get('/resources', 'HomeController@resources');
Route::get('/volunteers', 'HomeController@volunteers');
Route::get('/volunteer', 'VolunteerController@getVolunteers');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/volunteerSubmit', 'VolunteerController@submit')->name('volunteerSubmit');
