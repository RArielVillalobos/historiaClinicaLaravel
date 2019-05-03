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

Route::get('test',function (){
     return 'permiso concedido';
})->middleware('role');
Route::get('/',function (){
    return view('welcome');
});

Route::get('/home',function (){
    return view('home');
})->middleware('auth');
//ruta autenticacion
Auth::routes(['verify' => true]);
//backoffice
Route::group(['middleware'=>['auth'],'as'=>'backoffice.'],function (){
        Route::get('admin','AdminController@show')->name('admin');
        Route::get('user/import','UserController@import')->name('user.import');
        Route::post('user/make_import','UserController@make_import')->name('user.make_import');

        //Route::get('role','RoleController@index')->name('role.index');
        //en vez de crear cada ruta para el crud lo podemos hacer asi, primer parametro nombre de la entidad
        Route::resource('user','UserController');
        Route::get('user/{user}/assign_role','UserController@assign_role')->name('user.assign_role');
        Route::post('user/{user}/role_assignament','UserController@role_assignament')->name('user.role_assignament');
        Route::get('user/{user}/assign_permission','UserController@assign_permission')->name('user.assign_permission');
        Route::post('user/{user}/permission_assignament','UserController@permission_assignament')->name('user.permission_assignament');

        Route::resource('role','RoleController');
        Route::resource('permission','PermissionController');


});