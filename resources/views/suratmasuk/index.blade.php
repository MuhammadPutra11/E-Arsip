@extends('layouts.main')

@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="grid gap-4 mb-4">
         <div class="flex">
            <h2 class="font-bold text-2xl">Data Surat Masuk</h2>
            <a href="/suratmasuk/create" class="font-medium p-1.5 ml-10 rounded-md text-White bg-cyan-300 dark:text-blue-500 hover:bg-cyan-500">+ Tambah Surat Masuk</a>

            <form action="/suratmasuk" class="w-80 mx-10 right-0">   
                <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                    </div>
                    <input name="search" type="text" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search ..." required />
                    <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>
            </form>

         </div>

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
       <thead class="text-s text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
           <tr>
               <th scope="col" class="px-6 py-3">
                  No
               </th>
               <th scope="col" class="px-6 py-3">
                   Nama Surat Masuk
               </th>
               <th scope="col" class="px-6 py-3">
                   Tanggal
               </th>
               <th scope="col" class="px-6 py-3">
                   Pengirim
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
        @foreach ($suratmasuk as $suratmasuk)
           <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               <th class="pl-8 py-4 ">
                {{ $loop->iteration }}
               </th>
               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $suratmasuk->nama_suratmasuk }}
               </th>
               <td class="px-6 py-4">
                {{ $suratmasuk->tanggal_suratmasuk }}
               </td>
               <td class="px-6 py-4">
                {{ $suratmasuk->user->username }}
               </td>
               <td class="px-6 py-4">
                {{ $suratmasuk->catatan }}
               </td>
               <td class="px-6 py-4 flex">
                  <a href="{{ route('suratmasuk.download', $suratmasuk->id) }}" class="font-medium p-1.5 rounded-md text-black bg-green-500 dark:text-blue-500 hover:underline">Download</a>
                  <a href="/suratmasuk/{{ $suratmasuk->id }}/edit" class="font-medium p-1.5 rounded-md text-black bg-blue-500 dark:text-blue-500 hover:underline">Edit</a>
                  <form action="/suratmasuk/{{ $suratmasuk->id }}" method="post" class='d-inline'>
                    @method('delete')
                    @csrf
                    <button type="submit" class="font-medium p-1.5 rounded-md text-black bg-red-500 dark:text-blue-500 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
               </td>
           @endforeach
       </tbody>
   </table>
</div>

      </div>
   </div>
</div>

@endsection


