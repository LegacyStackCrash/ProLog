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

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@show');
    Route::get('/issues', 'IssuesController@index');
    Route::get('/projects', 'ProjectsController@index');
    Route::get('/customers', 'CustomersController@index');
    Route::get('/departments', 'DepartmentsController@index');
});

