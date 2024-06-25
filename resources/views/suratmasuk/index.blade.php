@extends('layouts.main')

@section('container')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
      <div class="grid gap-4 mb-4">
        <h2 class="font-bold text-2xl">Data Surat Masuk</h2>
         
        

<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
   <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
       <thead class="text-s text-gray-800 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
           <tr>
               <th scope="col" class="px-6 py-3">
                   Product name
               </th>
               <th scope="col" class="px-6 py-3">
                   Color
               </th>
               <th scope="col" class="px-6 py-3">
                   Category
               </th>
               <th scope="col" class="px-6 py-3">
                   Price
               </th>
               <th scope="col" class="px-6 py-3 ">
                   Aksi
               </th>
           </tr>
       </thead>
       <tbody>
           <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
               <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   Apple MacBook Pro 17"
               </th>
               <td class="px-6 py-4">
                   Silver
               </td>
               <td class="px-6 py-4">
                   Laptop
               </td>
               <td class="px-6 py-4">
                   $2999
               </td>
               <td class="px-6 py-4">
                  <a href="#" class="font-medium p-1.5 rounded-md text-black bg-green-500 dark:text-blue-500 hover:underline">View</a>
                  <a href="#" class="font-medium p-1.5 rounded-md text-black bg-blue-500 dark:text-blue-500 hover:underline">Edit</a>
                  <a href="#" class="font-medium p-1.5 rounded-md text-black bg-red-500 dark:text-blue-500 hover:underline">Delete</a>
               </td>
           </tr>
           
       </tbody>
   </table>
</div>

      </div>
   </div>
</div>

@endsection


