<?php

namespace App\Http\Controllers;

use Illuminate\http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Dokumen;
use App\Models\Status;
use App\Http\Requests\StoreDokumenRequest;
use App\Http\Requests\UpdateDokumenRequest;
use App\Models\File;
use Faker\Core\File as CoreFile;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Dokumen $dokumen)
    {
        $dokumens = Dokumen::latest();

        if(request('search')) {
            $dokumens->where('nama_dokumen', 'like', '%' . request('search') . '%');
        }

        return view('dokumen.index', [
            "dokumen" => $dokumens->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dokumen.create', [
            'status' => Status::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDokumenRequest $request)
    {
        $validatedData = $request->validate([
            'nama_dokumen' => 'required|max:255',
            'tanggal_dokumen' => 'required',
            'pengedit_dokumen' => 'required',
            'status_id' => 'nullable',
            'catatan' => 'nullable',
            'file_dokumen' => 'file|max:5096'
        ]);

        if($request->file('file_dokumen')) {
            $validatedData['file_dokumen'] = $request->file('file_dokumen')->store('file_dokumen');
        }

        $validatedData['user_id'] = auth()->user()->id;

        Dokumen::create($validatedData);

        return redirect('/dokumen')->with('success', 'Dokumen telah diupdate');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dokumen $dokumen){
        // return view('dokumen', [
        //     "title" => "Single dokumen",
        //     "active" => "dokumen",
        //     "dokumen" => $dokumen 
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $dokumen = Dokumen::findOrFail($id);

    return view('dokumen.edit', [
        'dokumen' => $dokumen,
        'status' => Status::all()
    ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dokumen $dokumen)
    {
        $validatedData = $request->validate([
            'nama_dokumen' => 'required|max:255',
            'tanggal_dokumen' => 'required',
            'pengedit_dokumen' => 'required',
            'status_id' => 'nullable',
            'catatan' => 'nullable',
            'file_dokumen' => 'file|max:5096'
        ]);

        // Jika ada file yang diunggah, tangani file upload
        if ($request->hasFile('file_dokumen')) {
            $file = $request->file('file_dokumen');
            $path = $file->store('dokumen_files'); // Simpan file di direktori "dokumen_files"
            $validatedData['file_dokumen'] = $path;
        }

        $validatedData['user_id'] = auth()->user()->id;

        // Update dokumen menggunakan instance model langsung
        $dokumen->update($validatedData);

        return redirect('/dokumen')->with('success', 'Dokumen telah diupdate');
    }

    public function download($id)
    {
        // Cari file berdasarkan ID
        $dokumen = Dokumen::findOrFail($id);

        // Ambil path file dari database
        $filePath = $dokumen->file_dokumen;

        // Cek apakah file path ada dan valid
        if ($filePath && Storage::exists($filePath)) {
            return Storage::download($filePath);
        } else {
            return redirect()->back()->with('error', 'File tidak ditemukan.');
        }
    }



     /** Remove the specified resource from storage.*/
     public function destroy($id)
     {
         $dokumen = Dokumen::findOrFail($id);
         $dokumen->delete();
 
         return redirect('/dokumen')->with('success', 'Dokumen telah dihapus');
     }
}
