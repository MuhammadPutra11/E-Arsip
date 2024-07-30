<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SuratKeluarController;

// Route::get('/', function () {
//     return view('dashboard');
// });

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');;


Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar', [DaftarController::class, 'store']);




//Dokumen
Route::get('/dokumen', [DokumenController::class, 'index']);

// Route::get('/dokumen', function () {
//     return view('dokumen.index');
// });
Route::get('/dokumen/view', function () {
    return view('dokumen.view');
});
// Route::get('/dokumen/create', function () {
//     return view('dokumen.create');
// });
Route::resource('dokumen', DokumenController::class)->middleware('auth');
Route::get('dokumen/downloaddokumen/{id}', [DokumenController::class, 'download'])->name('dokumen.download')->middleware('auth');
//Route::get('/dokumen/edit', function () {
//    return view('dokumen.edit');
//});


//Surat Masuk
Route::get('/suratmasuk', [SuratMasukController::class, 'index']);
// Route::get('/suratmasuk', function () {
//     return view('suratmasuk.index');
// });
Route::get('/suratmasuk/view', function () {
    return view('suratmasuk.view');
});
// Route::get('/suratmasuk/create', function () {
//     return view('suratmasuk.create');
// });
// Route::get('/suratmasuk/create', [SuratMasukController::class, 'create'])->name('suratmasuk.create');
// Route::post('/suratmasuk', [SuratMasukController::class, 'store'])->name('suratmasuk.store');
Route::resource('suratmasuk', SuratMasukController::class)->middleware('auth');
Route::get('suratmasuk/downloadsuratmasuk/{id}', [SuratMasukController::class, 'download'])->name('suratmasuk.download')->middleware('auth');

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
// Route::get('/suratkeluar/create', function () {
//     return view('suratkeluar.create');
// });
Route::resource('suratkeluar', SuratKeluarController::class)->middleware('auth');
Route::get('suratkeluar/downloadsuratkeluar/{id}', [SuratKeluarController::class, 'download'])->name('suratkeluar.download')->middleware('auth');

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
// Route::get('/foto/create', function () {
//     return view('foto.create');
// });
Route::resource('foto', FotoController::class)->middleware('auth');
Route::get('foto/downloadfoto/{id}', [FotoController::class, 'download'])->name('foto.download')->middleware('auth');

Route::get('/foto/edit', function () {
    return view('foto.edit');
});
