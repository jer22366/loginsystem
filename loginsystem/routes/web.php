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

Route::get('/', function () {
    return view('login');
});
Route::get('/mainpage', function () {
    return view('mainPage');
});
Route::get('/registerpage', function () {
    return view('registerPage');
});
Route::get('/refresh', function () {
    return view('refresh');
});
Route::get('/managermainpage', function () {
    return view('managerMainpage');
});

Route::get('/managerRefresh', function () {
    return view('managerRefresh');
});

Route::post('/acc/log','App\Http\Controllers\accountloginController@accountlogin');

Route::post('/acc/reg','App\Http\Controllers\registerController@accountregister');

Route::post('/getData','App\Http\Controllers\getDataController@getData');

Route::post('/refreshData','App\Http\Controllers\refreshController@refreshData');

Route::post('/manageShowData','App\Http\Controllers\mainPageShowDataController@managerShowData');

Route::post('/removeData','App\Http\Controllers\manageremoveDataController@managerRemoveData');

Route::post('/managerSetSession','App\Http\Controllers\managerSetSessionController@managerSetSession');

Auth::routes();


