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
Route::get('categories','CategoryController@index');

Route::get('categories/create','CategoryController@create');
Route::post('categories','CategoryController@store');
Route::get('categories/{id}/edit','CategoryController@edit');
Route::put('categories/{id}','CategoryController@update');
Route::delete('categories/{id}', 'CategoryController@destroy');

Route::get('categories/{id}', 'CategoryController@show');



Route::get('/getdata/{id}','CategoryController@getData');




Route::post('/addproduit', 'CategoryController@addProduit');
Route::put('/updateproduit', 'CategoryController@updateProduit');
Route::delete('/deleteproduit/{id}', 'CategoryController@deleteProduit');




Auth::routes();

Route::get('/home', 'CategoryController@index')->name('home');
Route::get('/dashboard', 'CategoryController@dashboard')->name('dashboard');
