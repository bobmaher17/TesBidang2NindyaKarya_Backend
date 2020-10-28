<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'Api\LoginController@index');
Route::post('/logout', 'Api\LoginController@logout');

    //PRODUKSI MODULE
    Route::get('/produksi', 'Api\ProduksiController@index');
    Route::post('/produksi', 'Api\ProduksiController@create');
    Route::get('/produksi/{id}', 'Api\ProduksiController@getById');
    Route::post('/produksi/{id}', 'Api\ProduksiController@update');
    Route::delete('/produksi/{id}', 'Api\ProduksiController@delete');
