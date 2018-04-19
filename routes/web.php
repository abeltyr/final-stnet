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

Route::get('/',[
    'uses' => 'AdminsController@index',
    'as' => 'well',
]);

Route::resources([
'Admin' => 'AdminsController'
]);

Route::POST('/stnet/admin/login',[
    'uses' => 'AdminsController@adminSignin',
    'as' => 'adminSignin',
]);

Route::GET('/stnet/admin',[
    'uses' => 'AdminsController@viewadmin',
    'as' => 'viewadmin',
]);

Route::get('/logout',[
    'uses' => 'AdminsController@Logout',
    'as' => 'Logout',
]);
