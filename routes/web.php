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
// Route::auth();
// Route::middleware('auth');
// Route::get('/', "GroupController@index");
// Route::get('/home', "GroupController@index");
// Route::post('/', 'HomeController@index');
// Route::post('/group',"GroupController@store");
// Route::put('/group/{id}',"GroupController@update");
// Route::delete('/group/{id}',"GroupController@destroy");
// Route::get('/list/edit/{id}', "GroupController@show");





Route::middleware('auth')->group(function () {
    
    Route::get('/', 'GroupController@index');
    Route::get('/home', 'GroupController@index');
    Route::post('/group', 'GroupController@store');
    Route::get('/group/edit/{id}', 'GroupController@edit');
    Route::put('/group/{id}', 'GroupController@update');
    Route::delete('/group/{id}', 'GroupController@destroy');
    Route::get('/group/edit/{id}', 'GroupController@show');

    Route::post('/group/{id}', 'TaskController@store');
    Route::get('/group/{id}', 'TaskController@show');
    // Route::put('/group/{id}',"TaskController@update");
    Route::put('/tasks/{task}', 'TaskController@update');
    Route::delete('/tasks/{task}',"TaskController@destroy");
    Route::get('/group{id}', 'TaskController@index');
    });


Auth::routes();

Route::post('/', 'HomeController@index');



