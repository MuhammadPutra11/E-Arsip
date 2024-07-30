<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Http\Requests\StoreFotoRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateFotoRequest;

class FotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $foto = Foto::latest();

        if(request('search')) {
            $foto->where('nama_foto', 'like', '%' . request('search') . '%');
        }

        return view('foto.index', [
            "foto" => $foto->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('foto.create');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFotoRequest $request)
    {
        $validatedData = $request->validate([
            'nama_foto' => 'required|max:255',
            'tanggal_foto' => 'required',
            'catatan' => 'nullable',
            'file_foto' => 'image|file|max:5096'
        ]);

        if($request->file('file_foto')) {
            $validatedData['file_foto'] = $request->file('file_foto')->store('file_foto');
        }

        $validatedData['user_id'] = auth()->user()->id;

        foto::create($validatedData);

        return redirect('/foto')->with('success', 'foto telah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $foto = Foto::findOrFail($id);

        return view('foto.edit', [
            'foto' => $foto
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFotoRequest $request, Foto $foto)
    {
        //
    }

    public function download($id)
    {
        // Cari file berdasarkan ID
        $foto = Foto::findOrFail($id);

        // Ambil path file dari database
        $filePath = $foto->file_foto;

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
         $foto = Foto::findOrFail($id);
         $foto->delete();
 
         return redirect('/foto')->with('success', 'foto telah dihapus');
     }
}
