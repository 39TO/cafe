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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', 'CafeController@index')->name('top');
Route::get('/cafe_cafe', 'PlayerController@index');

Route::get('/contact', 'CafeController@contactForm')->name('contact');

Route::get('/edit/{id}', 'CafeController@editForm')->name('edit');

Route::post('/confirm', 'CafeController@confirmForm')->name('confirm');

Route::post('/complete', 'CafeController@completeForm')->name('complete');


Route::post('/update/{id}', 'CafeController@updateForm')->name('update');

Route::post('/delete/{id}', 'CafeController@deleteForm')->name('delete');



