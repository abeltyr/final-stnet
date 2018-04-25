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
Route::get('/',function(){
    return view('welcome');
}
);

Route::prefix('Admin')->group(function (){
    
    Route::resources([
    '/' => 'AdminsController'
    ]);
    Route::POST('/AdminLoging',[
        'uses' => 'AdminsController@adminSignin',
        'as' => 'adminSignin',
    ]);
    Route::GET('/Admin',[
        'uses' => 'AdminsController@viewadmin',
        'as' => 'viewadmin',
    ]);
    Route::Post('/logingout',[
        'uses' => 'AdminsController@Logout',
        'as' => 'Logout',
    ]);

    Route::POST('/Admin/signup',[
        'uses' => 'AdminsController@store',
        'as' => 'adminStore',
    ]);

});
