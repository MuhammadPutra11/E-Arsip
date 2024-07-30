<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Http\Requests\StoreSuratMasukRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateSuratMasukRequest;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratmasuk = SuratMasuk::latest();

        if(request('search')) {
            $suratmasuk->where('nama_suratmasuk', 'like', '%' . request('search') . '%');
        }

        return view('suratmasuk.index', [
            "suratmasuk" => $suratmasuk->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suratmasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuratMasukRequest $request)
    {
        $validatedData = $request->validate([
            'nama_suratmasuk' => 'required|max:255',
            'tanggal_suratmasuk' => 'required',
            'pengirim' => 'nullable',
            'catatan' => 'nullable',
            'file_suratmasuk' => 'file|max:5096'
        ]);

        if($request->file('file_suratmasuk')) {
            $validatedData['file_suratmasuk'] = $request->file('file_suratmasuk')->store('file_suratmasuk');
        }

        $validatedData['user_id'] = auth()->user()->id;

        SuratMasuk::create($validatedData);

        return redirect('/suratmasuk')->with('success', 'Surat masuk telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratmasuk = SuratMasuk::findOrFail($id);

        return view('suratmasuk.edit', [
            'suratmasuk' => $suratmasuk
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratMasukRequest $request, SuratMasuk $suratMasuk)
    {
        //
    }


    public function download($id)
    {
        // Cari file berdasarkan ID
        $suratmasuk = SuratMasuk::findOrFail($id);

        // Ambil path file dari database
        $filePath = $suratmasuk->file_suratmasuk;

        // Cek apakah file path ada dan valid
        if ($filePath && Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suratmasuk = SuratMasuk::findOrFail($id);
        $suratmasuk->delete();
 
        return redirect('/suratmasuk')->with('success', 'Surat Masuk telah dihapus');
    }
}
