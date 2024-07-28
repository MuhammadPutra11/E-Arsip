<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Support\Str;
use App\Http\Requests\StoreDokumenRequest;
use App\Http\Requests\UpdateDokumenRequest;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Dokumen $dokumen)
    {

        return view('dokumen.index', [
            "dokumen" => Dokumen::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokumen.create', [
            'dokumen' => Dokumen::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDokumenRequest $request)
    {
        $validatedData = $request->validate([
            'nama_dokumen' => 'required|max:255',
            'tanggal_dokumen' => 'required|max:255',
            'user_id' => 'required',
            'pengedit_dokumen' => 'required',
            'status' => 'required',
            'catatan' => 'required',
            'file_dokumen' => 'file_dokumen|file|max:10048'
        ]);

        if ($request->file('file_dokumen')) {
            $validatedData['file_dokumen'] = $request->file('file_dokumen')->store('dokumen-file_dokumes');
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($validatedData['body']), 200);

        Dokumen::create($validatedData);

        return redirect('/dokumen/index')->with('Sukses', 'Dokumen baru telah di tambahkan !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen){
        return view('dokumen', [
            "title" => "Single dokumen",
            "active" => "dokumen",
            "dokumen" => $dokumen 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dokumen $dokumen)
    {
        return view('dokumen.edit', [
            'dokumen' => $dokumen
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDokumenRequest $request, Dokumen $dokumen)
    {
        //
    }


     /** Remove the specified resource from storage.*/
    public function destroy(Dokumen $dokumen)
    {
        if($dokumen->file_dokumen){
            Storage::delete($dokumen->file_dokumen);
        }
        Dokumen::destroy($dokumen->id);

        return redirect('/dokumen/index')->with('success', 'Dokumen telah dihapus!');
    }
}
