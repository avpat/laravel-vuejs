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


Route::ApiResource('/units', 'UnitController')
    ->only(['index', 'show']);

Route::post('/units/{unitId}', 'ChargeController@store')->name('charge.store');
Route::post('/units/{unitId}/charges/{chargeId}', 'ChargeController@update')->name('charge.update');
