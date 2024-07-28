@extends('layouts.main')

@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="grid gap-4 mb-4">
         <div class="flex">
            <h2 class="font-bold text-2xl">Foto Foto Kegiatan</h2>
            <a href="/foto/create" class="font-medium p-1.5 ml-10 rounded-md text-White bg-cyan-300 dark:text-blue-500 hover:bg-cyan-500">+ Tambah Foto</a>
         </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
       <thead class="text-s text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
           <tr>
               <th scope="col" class="px-6 py-3">
                  No
               </th>
               <th scope="col" class="px-6 py-3">
                Foto
                </th>
               <th scope="col" class="px-6 py-3">
                   Nama Foto
               </th>
               <th scope="col" class="px-6 py-3">
                   Tanggal Foto
               </th>
               <th scope="col" class="px-6 py-3">
                   Catatan
               </th>
               <th scope="col" class="px-6 py-3">
                    Aksi
                </th>
           </tr>
       </thead>
       <tbody>
        @foreach ($foto as $foto)
           <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               <th class="pl-8 py-4 ">
                {{ $loop->iteration }}
               </th>
               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   <img src="data:image/jpeg;base64,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"></img>
               </th>
               <td class="px-6 py-4">
                {{ $foto->nama_foto }}
               </td>
               <td class="px-6 py-4">
                {{ $foto->tanggal_foto }}
               </td>
               <td class="px-6 py-4">
                {{ $foto->catatan }}
               </td>
               <td class="px-6 py-4">
                  <a href="/foto/view" class="font-medium p-1.5 rounded-md text-black bg-green-500 dark:text-blue-500 hover:underline">Detail</a>
                  <a href="/foto/edit" class="font-medium p-1.5 rounded-md text-black bg-blue-500 dark:text-blue-500 hover:underline">Edit</a>
                  <form action="/foto/{{ $foto->id }}" method="post" class='d-inline'>
                    @method('delete')
                    @csrf
                      <a href="#" class="font-medium p-1.5 rounded-md text-black bg-red-500 dark:text-blue-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</a>
                    </form>
               </td>
           </tr>
           
       </tbody>
   </table>
</div>
      </div>
   </div>
</div>

@endsection


