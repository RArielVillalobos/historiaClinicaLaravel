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
        Route::resource('role','RoleController');

});