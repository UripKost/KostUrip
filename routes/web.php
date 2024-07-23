<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KamarController;

Route::get('/', function () {
    return view('index');
});

Route::get('/booking', function () {
    return view('pages.booking.index');
});

Route::get('/masuk', function () {
    return view('pages.login.index');
});

Route::get('/admin', function () {
    return view('pages.admin.index');
});

Route::get('/register', function () {
    return view('pages.register.index');
});

// Route::get('/index','App\Http\Controllers\KamarController@index')->name ('index');
// Route::get('/tambah','App\Http\Controllers\KamarController@tambah')->name ('tambah');
// Route::get('/simpan','App\Http\Controllers\KamarController@store')->name ('simpan');
// Route::post('/simpan', [KamarController::class, 'simpan']);
Route::get('/userindex', [KamarController::class, 'userindex'])->name('kamar.userindex');
Route::get('/index', [KamarController::class, 'index'])->name('kamar.index');
Route::get('/tambah', [KamarController::class, 'tambah'])->name('kamar.tambah');
Route::post('/kamar', [KamarController::class, 'store'])->name('kamar.store');
Route::get('/kamar/{id}/edit', [KamarController::class, 'edit'])->name('kamar.edit');
Route::put('/kamar/{id}', [KamarController::class, 'update'])->name('kamar.update');
Route::delete('/kamar/{id}', [KamarController::class, 'destroy'])->name('kamar.destroy');