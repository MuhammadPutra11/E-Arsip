@extends('layouts.main')

@section('container')
<
  
  <div class="px-4  sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
       <div class="grid gap-4 mb-4">
        <form method="post" action="/foto" class="max-w-sm ml-5">
            @csrf
            <h2 class="font-bold text-2xl mb-5">Edit Foto</h2>
            <!-- -- <div class="mb-5">
                <label for="large-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Large input</label>
                <input type="text" id="large-input" class="block w-full p-4 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div> --
            -- <div> -->
                <!-- <label for="small-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Small input</label>
                <input type="text" id="small-input" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div> -- -->
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Foto</label>
                <input name="nama_foto" type="text" value="{{ old('nama_foto', $foto->nama_foto) }}" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Foto</label>
                <input name="tanggal_foto" type="text" value="{{ old('tanggal_foto', $foto->tanggal_foto) }}" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Catatan (opsional)</label>
                <input name="catatan" type="text" value="{{ old('catatan', $foto->catatan) }}" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            </div>
            
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Upload Foto</label>
            <input name="file_foto" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
            <div class="mt-1 text-sm text-red-500 dark:text-gray-300" id="user_avatar_help">Pilih Foto Anda</div>
        
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>

        </form>
       </div>
    </div>
 </div>

@endsection
