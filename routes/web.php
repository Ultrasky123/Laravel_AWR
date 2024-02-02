<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Index Page
Route::get('/', function () {
    return view('webpage.index');
})->name('index');
// Bcrypt Page
Route::get('/123', function () {
    return view('webpage.bycript');
});
// Home Page
Route::get('/home', function () {
    return view('webpage.home');
})->name('home')->middleware('auth');

// Layout Page
Route::get('/layout', function () {
    return view('layout.layout');
})->name('layout');

Route::get('/load', [LoadController::class, 'processStatus'])->name('load');

// Index- Setlanguage
Route::group(['prefix' => '{locale}'], function () {
    Route::get('/', function () {
        return view('webpage.index');
    })->middleware('setLocale');
});

// Home- Setlanguage
Route::group(['prefix' => '{locale}'], function () {
    Route::get('/home', function () {
        return view('webpage.home');
    })->middleware('setLocale');
});

// Authentication Login
Route::post('/login', [AuthController::class, 'authenticate']);

// Log Out
Route::post('/signout', [AuthController::class, 'SignOut'])->name('signout');
