<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/dokumen', function () {
    return view('dokumen.form');
});

Route::get('/suratmasuk', function () {
    return view('suratmasuk.index');
});

Route::get('/suratkeluar', function () {
    return view('suratkeluar.index');
});

Route::get('/foto', function () {
    return view('foto.index');
});