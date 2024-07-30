<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\Foto;

class DashboardController extends Controller
{
    //


    public function index()
    {
        $jumlah_dokumen = Dokumen::all()->count();
        $jumlah_suratmasuk = SuratMasuk::all()->count();
        $jumlah_suratkeluar = SuratKeluar::all()->count();
        $jumlah_foto = Foto::all()->count();

        return view('dashboard', compact('jumlah_dokumen', 'jumlah_suratmasuk', 'jumlah_suratkeluar', 'jumlah_foto'));
    }
}
