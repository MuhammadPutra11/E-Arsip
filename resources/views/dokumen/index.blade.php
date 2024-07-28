@extends('layouts.main')

@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="grid gap-4 mb-4">
         <div class="flex">
            <h2 class="font-bold text-2xl">Data Dokumen</h2>
            <a href="/dokumen/create" class="font-medium p-1.5 ml-10 rounded-md text-White bg-cyan-300 dark:text-blue-500 hover:bg-cyan-500">+ Tambah Dokumen</a>
         </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   <table class="w-full table-fixed text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
       <thead class="text-s text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">            
           <tr>
               <th scope="col" class="px-8 py-3">
                  No
               </th>
               <th scope="col" class="px-6 py-3">
                   Nama Dokumen
               </th>
               <th scope="col" class="px-6 py-3">
                   Tanggal
               </th>
               <th scope="col" class="px-6 py-3">
                   Pengedit
               </th>
               <th scope="col" class="px-6 py-3">
                   Status
               </th>
               <th scope="col" class="px-6 py-3 ">
                   Catatan
               </th>
               <th scope="col" class="px-6 py-3 ">
                  Aksi
              </th>
           </tr>
       </thead>
       <tbody>
        @foreach ($dokumen as $dokumen)

           <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               <th class="pl-8 py-4 ">
                {{ $loop->iteration }}
               </th>
               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $dokumen->nama_dokumen }}
               </th>
               <td class="px-6 py-4">
                {{ $dokumen->tanggal_dokumen }}
               </td>
               <td class="px-6 py-4">
                {{ $dokumen->pengedit_dokumen }}
               </td>
               <td class="px-6 py-4">
                {{ $dokumen->status }}
               </td>
               <td class="px-6 py-4 overflow-x-auto">
                {{ $dokumen->catatan }}
               </td>
               <td class="px-6 py-4">
                  <a href="/dokumen/view" class="font-medium p-1.5 rounded-md text-black bg-green-500 dark:text-blue-500 hover:underline">View</a>
                  <a href="/dokumen/{{ $dokumen->id }}/edit" class="font-medium p-1.5 rounded-md text-black bg-blue-500 dark:text-blue-500 hover:underline">Edit</a>
                  <form action="/dokumen/{{ $dokumen->id }}" method="post" class='d-inline'>
                  @method('delete')
                  @csrf
                    <a href="#" class="font-medium p-1.5 rounded-md text-black bg-red-500 dark:text-blue-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</a>
                  </form>
                </td>
           </tr>
           @endforeach
           
       </tbody>
   </table>
</div>

      </div>
   </div>
</div>

@endsection


