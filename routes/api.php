<?php

use App\Http\Controllers\APILoadAccessController;
use App\Http\Controllers\APILoadHomeController;
use App\Http\Controllers\APILoadWeaponController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('/home-status', APILoadHomeController::class, [
    'only' => ['index', 'show']
]);

Route::resource('/weapon-status', APILoadWeaponController::class, [
    'only' => ['index']
]);

Route::resource('/access-status', APILoadAccessController::class, [
    'only' => ['index']
]);


