<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FormController;
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

// Board Status Page
Route::get('/board', function () {
    return view('webpage.board');
})->name('board')->middleware('auth');

// Tambah Page
Route::group(['prefix' => '{locale}'], function () {
    Route::get('/tambah', function () {
        return view('webpage.forms.tambah');
    })->name('tambah')->middleware(['auth', 'setLocale']);
});

// Processing Database
Route::get('/add-status', [FormController::class, 'index'])->name('add-status');

// Index- Setlanguage
Route::group(['prefix' => '{locale}'], function () {
    Route::get('/', function () {
        return view('webpage.index');
    })->middleware('setLocale');
});

Route::group(['prefix' => '{locale}'], function () {
    Route::get('/access', function () {
        return view('webpage.access');
    })->middleware('setLocale');
});

// Home - Locale - Language - ShowData
Route::group(['prefix' => '{locale}'], function () {
    Route::get('/home', [LoadController::class, 'ShowDATAHome'])->name('home')->middleware(['setLocale', 'auth']);
    Route::get('/access', [LoadController::class, 'LoadStatusAccess'])->name('access')->middleware(['setLocale', 'auth']);
    Route::get('/weapon', [LoadController::class, 'showDataWeapon'])->name('weapon')->middleware(['setLocale', 'auth']);
});

// Board- Setlanguage
Route::group(['prefix' => '{locale}'], function () {
    Route::get('/board', function () {
        return view('webpage.board');
    })->middleware('setLocale');
});

// Authentication Login
Route::post('/login', [AuthController::class, 'authenticate']);

// Store Data
// Route::post('/store', [FormController::class, 'store'])->name('store');
Route::post('/store/{locale}', [FormController::class, 'store'])->name('store');

// Log Out
Route::post('/signout', [AuthController::class, 'SignOut'])->name('signout');

// Edit Data in Access Page
Route::get('/edit/{id_senjata}', [FormController::class, 'edit'])->name('edit');

// Delete Data in Access Page
Route::get('/delete/{id_senjata}', [FormController::class, 'Delete'])->name('delete');

// Delete Data in Access Page
Route::get('/showform', [FormController::class, 'showForm'])->name('showform');

// Update Data
Route::post('/update/{id_senjata}', [FormController::class, 'update'])->name('update');
