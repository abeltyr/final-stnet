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
    Route::Post('/logingout',[
        'uses' => 'AdminsController@Logout',
        'as' => 'Logout',
    ]);
    Route::resources([
       '/School'=>'SchoolController'
    ]);

});
Route::group(['prefix'=>'{SchoolName}'],function (){
    Route::get('/Admin',[
        'uses' => 'SchoolAdminController@index',
    ]);
    Route::resources([
       '/Staff' => "StaffsController"
    ]);
    Route::resources([
       'Batchs' => "BatchController"
    ]);
    Route::POST('/Batch/tableadded',[
        'uses' => 'BatchController@addtable',
    ]);
    Route::POST('/Table/delete',[
        'uses' => 'BatchController@Tabledelete',
    ]);
    


});


Route::POST('/SchoolAdminLoging',[
    'uses' => 'SchoolAdminController@schooladminSignin',
    'as' => 'schooladminSignin',
]);
Route::POST('/Schoollogingout',[
    'uses' => 'SchoolAdminController@schoolLogout',
    'as' => 'schoolLogout',
]);

Route::POST('/SchoolStaffLoging',[
    'uses' => 'StaffsController@schoolstaffSignin',
    'as' => 'schoolstaffSignin',
]);
Route::Post('/Schoolstafflogingout',[
    'uses' => 'StaffsController@schoolstaffLogout',
    'as' => 'schoolstaffLogout',
]);