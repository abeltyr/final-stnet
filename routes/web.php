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
Route::group(['middleware' => ['web']], function (){
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
        'middleware' => 'auth.admin'
    ]);

    Route::GET('/stnet/admin',[
        'uses' => 'AdminsController@viewadmin',
        'as' => 'viewadmin',
        'middleware' => 'auth.admin'
    ]);
    Route::Post('/logout',[
        'uses' => 'AdminsController@Logout',
        'as' => 'Logout',
    ]);

    Route::POST('/admin/signup',[
        'uses' => 'AdminsController@store',
        'as' => 'adminStore',
        'middleware' => 'auth.admin'
    ]);
});