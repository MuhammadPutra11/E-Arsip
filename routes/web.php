<?php

use App\Http\Controllers\DokumenController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\FotoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('layouts.login');
});

Route::get('/dokumen/{dokumen:id}', [DokumenController::class, 'show']);

//Dokumen
Route::get('/dokumen', [DokumenController::class, 'index']);

// Route::get('/dokumen', function () {
//     return view('dokumen.index');
// });
Route::get('/dokumen/view', function () {
    return view('dokumen.view');
});
Route::get('/dokumen/create', function () {
    return view('dokumen.create');
});
Route::get('/dokumen/edit', function () {
    return view('dokumen.edit');
});


//Surat Masuk
Route::get('/suratmasuk', [SuratMasukController::class, 'index']);
// Route::get('/suratmasuk', function () {
//     return view('suratmasuk.index');
// });
Route::get('/suratmasuk/view', function () {
    return view('suratmasuk.view');
});
Route::get('/suratmasuk/create', function () {
    return view('suratmasuk.create');
});
Route::get('/suratmasuk/edit', function () {
    return view('suratmasuk.edit');
});


//Surat Keluar
Route::get('/suratkeluar', [SuratKeluarController::class, 'index']);
// Route::get('/suratkeluar', function () {
//     return view('suratkeluar.index');
// });
Route::get('/suratkeluar/view', function () {
    return view('suratkeluar.view');
});
Route::get('/suratkeluar/create', function () {
    return view('suratkeluar.create');
});
Route::get('/suratkeluar/edit', function () {
    return view('suratkeluar.edit');
});


//foto
Route::get('/foto', [FotoController::class, 'index']);
// Route::get('/foto', function () {
//     return view('foto.index');
// });
Route::get('/foto/view', function () {
    return view('foto.view');
});
Route::get('/foto/create', function () {
    return view('foto.create');
});
Route::get('/foto/edit', function () {
    return view('foto.edit');
});
