<?php

use App\Http\Controllers\asetC;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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


Route::post('login/username', [AuthController::class, 'loginWithUsername']);
Route::post('login/token', [AuthController::class, 'loginWithToken']);

Route::middleware('auth:api')->group(function () {
    Route::get("inventaris", [asetC::class, 'inventaris']);
    Route::post("inventaris/create", "asetC@create");
    Route::put("inventaris/{idaset}/update", "asetC@update");
    Route::put("inventaris/{idaset}/destroy", "asetC@destroy");
    // Route::post('logout', [AuthController::class, 'logout'])->name("logout");
    // Route::get('me', [AuthController::class, 'me']);
});
