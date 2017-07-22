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

//view login form && login the user
Route::get('/', 'homeController@login');
Route::post('/login_user', 'homeController@login_user');
//logout user
Route::get('/logout','homeController@logout');
//registration form && register the user
Route::get('/reg', 'homeController@reg_view');
Route::post('/new_user', 'homeController@new_user');

//submission data form view and submit
Route::get('/form', 'homeController@form_view');
Route::post('/new_data', 'homeController@new_data');

//result of projects
Route::get('/result', 'homeController@result');