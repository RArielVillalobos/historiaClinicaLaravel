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

        Route::get('/patient/{user}/schedule','PatientController@back_schedule')->name('patient.back_schedule');
        Route::get('patient/{user}/appointments','PatientController@back_appointments')->name('patient.back_appointments');
        Route::get('patient/{user}/invoices','PatientController@back_invoices')->name('patient.back_invoices');

        //Route::get('role','RoleController@index')->name('role.index');
        //en vez de crear cada ruta para el crud lo podemos hacer asi, primer parametro nombre de la entidad
        Route::resource('user','UserController');


        Route::get('user/import','UserController@import')->name('user.import');
        Route::post('user/make_import','UserController@make_import')->name('user.make_import');

        Route::resource('role','RoleController');
        Route::get('user/{user}/assign_role','UserController@assign_role')->name('user.assign_role');
        Route::post('user/{user}/role_assignament','UserController@role_assignament')->name('user.role_assignament');

        Route::resource('permission','PermissionController');
        Route::get('user/{user}/assign_permission','UserController@assign_permission')->name('user.assign_permission');
        Route::post('user/{user}/permission_assignament','UserController@permission_assignament')->name('user.permission_assignament');

        Route::resource('speciality','SpecialityController');
        Route::get('user/{user}/assign_speciality','UserController@assign_speciality')->name('user.assign_speciality');
    Route::post('user/{user}/speciality_assignament','UserController@speciality_assignament')->name('user.speciality_assignament');



});

Route::group(['as'=>'frontoffice.'],function (){
    Route::get('profile','UserController@profile')->name('user.profile');
    Route::get('profile/{user}/edit','UserController@edit')->name('user.edit');
    Route::put('profile/{user}/update','UserController@update')->name('user.update');
    Route::get('profile/edit_password','UserController@edit_password')->name('user.edit_password');
    Route::put('profile/change_password','UserController@change_password')->name('user.change_password');
    Route::get('patient/schedule','PatientController@schedule')->name('patient.schedule');
    Route::get('patient/appointments','PatientController@appointments')->name('patient.appointments');
    Route::get('patient/prescriptions','PatientController@prescriptions')->name('patient.prescriptions');
    Route::get('patient/invoices','PatientController@invoices')->name('patient.invoices');

});