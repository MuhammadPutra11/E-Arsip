<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use App\Http\Requests\StoreSuratKeluarRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateSuratKeluarRequest;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratkeluar = SuratKeluar::latest();

        if(request('search')) {
            $suratkeluar->where('nama_suratkeluar', 'like', '%' . request('search') . '%');
        }

        return view('suratkeluar.index', [
            "suratkeluar" => $suratkeluar->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('suratkeluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuratKeluarRequest $request)
    {
        $validatedData = $request->validate([
            'nama_suratkeluar' => 'required|max:255',
            'tanggal_suratkeluar' => 'required',
            'pengirim' => 'nullable',
            'catatan' => 'nullable',
            'file_suratkeluar' => 'file|max:5096'
        ]);

        if($request->file('file_suratkeluar')) {
            $validatedData['file_suratkeluar'] = $request->file('file_suratkeluar')->store('file_suratkeluar');
        }

        $validatedData['user_id'] = auth()->user()->id;

        SuratKeluar::create($validatedData);

        return redirect('/suratkeluar')->with('success', 'Surat keluar telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratkeluar = SuratKeluar::findOrFail($id);

        return view('suratkeluar.edit', [
            'suratkeluar' => $suratkeluar
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratKeluarRequest $request, SuratKeluar $suratKeluar)
    {
        //
    }

    public function download($id)
    {
        // Cari file berdasarkan ID
        $suratkeluar = SuratKeluar::findOrFail($id);

        // Ambil path file dari database
        $filePath = $suratkeluar->file_suratkeluar;

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
        $suratkeluar = SuratKeluar::findOrFail($id);
        $suratkeluar->delete();
 
        return redirect('/suratkeluar')->with('success', 'Surat Keluar telah dihapus');
    }
}
