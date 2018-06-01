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
Route::get('/register', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/home', 'HomeController@show');

    Route::get('/users', 'UserController@index');
    Route::get('/users/create', 'UserController@create');
    Route::post('/users/create', 'UserController@store');
    Route::get('/users/{user}', 'UserController@show');
    Route::get('/users/edit/{user}', 'UserController@edit');
    Route::post('/users/edit/{user}', 'UserController@save');

    Route::get('/departments', 'DepartmentsController@index');
    Route::get('/departments/create', 'DepartmentsController@create');
    Route::post('/departments/create', 'DepartmentsController@store');
    Route::get('/departments/{department}', 'DepartmentsController@show');

    Route::get('/customers', 'CustomersController@index');
    Route::get('/customers/create', 'CustomersController@create');
    Route::post('/customers/create', 'CustomersController@store');
    Route::get('/customers/{customer}', 'CustomersController@show');

    Route::get('/projects', 'ProjectsController@index');
    Route::get('/projects/create', 'ProjectsController@create');
    Route::post('/projects/create', 'ProjectsController@store');

    Route::get('/issues', 'IssuesController@index');
    Route::get('/issues/create', 'IssuesController@create');
    Route::post('/issues/create', 'IssuesController@store');

    Route::get('/logout', function(){
        auth()->logout();
        return redirect('/');
    });
});