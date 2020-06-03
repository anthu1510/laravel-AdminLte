<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','AuthController@index');
Route::post('loginauth','AuthController@login');
Route::get('logout','AuthController@logout');
Route::get('hash/{password}','AuthController@hash');

Route::middleware(['loginAuth'])->group(function () {

    //Dashboard
    Route::prefix('dashboard')->group(function () {
        // Dashbaord
        Route::get('/','DashboardController@index');
        Route::get('changepassword','DashboardController@changePassword');
        Route::post('/changepassword/update','DashboardController@changePasswordUpdate');


        Route::prefix('users')->group(function () {
            //users
            Route::get('/','UserController@index');
            Route::post('save','UserController@Save');
            Route::post('update','UserController@Update');
            Route::post('edit','UserController@Edit');
            Route::post('delete','UserController@Delete');
            Route::post('editstatus','UserController@editStatus');
            Route::get('serverside','UserController@serverside');
        });
    });
});




