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
    Route::post('/users/delete/{user}', 'UserController@destroy');
    Route::get('/users/reset_password/{user}', 'UserController@reset_password');

    Route::get('/user/settings', 'UserController@settings');
    Route::post('/user/change_settings', 'UserController@change_settings');
    Route::post('/user/change_password', 'UserController@change_password');

    Route::get('/departments', 'DepartmentsController@index');
    Route::get('/departments/create', 'DepartmentsController@create');
    Route::post('/departments/create', 'DepartmentsController@store');
    Route::get('/departments/{department}', 'DepartmentsController@show');
    Route::get('/departments/edit/{department}', 'DepartmentsController@edit');
    Route::post('/departments/edit/{department}', 'DepartmentsController@save');
    Route::post('/departments/delete/{department}', 'DepartmentsController@destroy');

    Route::get('/customers', 'CustomersController@index');
    Route::get('/customers/create', 'CustomersController@create');
    Route::post('/customers/create', 'CustomersController@store');
    Route::get('/customers/{customer}', 'CustomersController@show');
    Route::get('/customers/edit/{customer}', 'CustomersController@edit');
    Route::post('/customers/edit/{customer}', 'CustomersController@save');
    Route::post('/customers/delete/{customer}', 'CustomersController@destroy');

    Route::get('/projects', 'ProjectsController@index');
    Route::get('/projects/create', 'ProjectsController@create');
    Route::post('/projects/create', 'ProjectsController@store');
    Route::get('/projects/{project}', 'ProjectsController@show');
    Route::get('/projects/edit/{project}', 'ProjectsController@edit');
    Route::post('/projects/edit/{project}', 'ProjectsController@save');
    Route::post('/projects/delete/{project}', 'ProjectsController@destroy');

    Route::get('/issues', 'IssuesController@index');
    Route::get('/issues/create', 'IssuesController@create');
    Route::post('/issues/create', 'IssuesController@store');
    Route::get('/issues/{issue}', 'IssuesController@show');
    Route::get('/issues/edit/{issue}', 'IssuesController@edit');
    Route::post('/issues/edit/{issue}', 'IssuesController@save');
    Route::post('/issues/delete/{issue}', 'IssuesController@destroy');

    Route::get('/logout', function(){
        auth()->logout();
        return redirect('/');
    });
});