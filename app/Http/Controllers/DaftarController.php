<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\support\Facades\Hash;

class DaftarController extends Controller
{
    public function index()
    {
        return view('daftar.index', [
            'title' => 'Daftar'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|max:50',
            'password' => 'required|min:3|max:50',
            'no_hp' => 'required|max:50'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        //$request->session()->flash('succes', 'Tambah User Berhasil !!');
        return redirect('/admin/user')->with('success', 'Tambah User Berhasil !!');
    }
}
