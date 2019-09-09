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
Route::get('categories/assigned-user','CategoryController@categoriesAssignediUser');
Route::get('/home', 'HomeController@index')->name('home.index');
Route::resource('categories', 'CategoryController');
Route::resource('companies', 'CompanyController');

