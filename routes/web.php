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
    return view('welcome');
});

Auth::routes();

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function (){
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('/batteries', 'BatteryController');
    Route::resource('/lamps', 'LampController');
    Route::resource('/modules', 'ModuleController');
    Route::resource('/systems', 'SystemController');
});

Route::resource('/systems', 'SystemController');

//Route::get('/home', 'HomeController@index')->name('home');
