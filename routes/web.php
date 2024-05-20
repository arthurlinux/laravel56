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
// Route::group(['middleware' => ['auth', 'verified']], function () {
Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function(){
  Route::get('/login', 'AuthAdmin\LoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'AuthAdmin\LoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.home');
  // Route::get('/perfil', 'AuthAdmin\LoginController@perfil')->name('perfil');
  Route::get('/usuarios', 'UsuariosController@index')->name('usuarios');
  Route::get('/editusuario/{id}', 'UsuariosController@edit')->name('editusuario');
  Route::post('/updateusuario/{id}', 'UsuariosController@update')->name('updateusuario');
  Route::get('/getusuario', 'UsuariosController@store')->name('getusuario');
  Route::post('/createusuario', 'UsuariosController@create')->name('createusuario');
  Route::get('/deleteusuario/{id}', 'UsuariosController@destroy')->name('deleteusuario');

  Route::get('/empresas', 'EmpresaController@index')->name('empresas');
  Route::get('/editempresa/{id}', 'EmpresaController@edit')->name('editempresa');
  Route::post('/updateempresa/{id}', 'EmpresaController@update')->name('updateempresa');
  Route::get('/getempresa', 'EmpresaController@store')->name('getempresa');
  Route::post('/createempresa', 'EmpresaController@create')->name('createempresa');
  Route::get('/deleteempresa/{id}', 'EmpresaController@destroy')->name('deleteempresa');

  Route::get('/modulos', 'ModuloController@index')->name('modulos');
  Route::get('/editmodulo/{id}', 'ModuloController@edit')->name('editmodulo');
  Route::post('/updatemodulo/{id}', 'ModuloController@update')->name('updatemodulo');
  Route::get('/getmodulo', 'ModuloController@store')->name('getmodulo');
  Route::post('/createmodulo', 'ModuloController@create')->name('createmodulo');
  Route::get('/deletemodulo/{id}', 'ModuloController@destroy')->name('deletemodulo');

  Route::get('/tickets', 'TicketsController@index')->name('tickets');
  Route::get('/editticket/{id}', 'TicketsController@edit')->name('editticket');
  Route::post('/updateticket/{id}', 'TicketsController@update')->name('updateticket');
  Route::get('/getticket', 'TicketsController@store')->name('getticket');
  Route::post('/createticket', 'TicketsController@create')->name('createticket');
  Route::get('/deleteticket/{id}', 'TicketsController@destroy')->name('deleteticket');

  Route::get('/reportes', 'ReportesController@index')->name('reportes');
  Route::get('/reporte', 'ReportesController@reporte')->name('reporte');

});
