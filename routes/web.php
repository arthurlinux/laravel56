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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function(){
  Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.home');
  Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
  Route::get('/editusuario/{id}', 'UsuariosController@edit')->name('editusuario');
  Route::post('/updateusuario/{id}', 'UsuariosController@update')->name('updateusuario');
  Route::get('/getusuario', 'UsuariosController@store')->name('getusuario');
  Route::post('/createusuario', 'UsuariosController@create')->name('createusuario');
  Route::get('/deleteusuario/{id}', 'UsuariosController@destroy')->name('deleteusuario');
});
