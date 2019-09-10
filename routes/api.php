<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//New Routes
Route::resource('users', 'UserController');
//las categorias asignadas a los usuario
Route::get('categories/assigned-user','CategoryController@categoriesAssignediUser');
Route::resource('categories', 'CategoryController');
//La api debe tener una ruta adicional que permita obtener una lista de manera jerarquica
Route::get('companies/list','CompanyController@listCompany');
Route::resource('companies', 'CompanyController');

