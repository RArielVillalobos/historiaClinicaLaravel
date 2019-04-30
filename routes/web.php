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

//ruta autenticacion
Auth::routes(['verify' => true]);

//backoffice
Route::group(['middleware'=>['auth'],'as'=>'backoffice.'],function (){
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