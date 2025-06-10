@extends('layouts.appadmin')

@section('title','FOODVANA')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Data Kontak</h2>
    <div class="table-responsive">
         <table class="w-full text-sm text-left rtl:text-right text-blue-100 dark:text-blue-100">
        <thead class="text-xs text-white uppercase bg-blue-600 dark:text-white">
            <tr>
                <th scope="col" class="px-6 py-3">No</th>
                <th scope="col" class="px-6 py-3">Nama Produk</th>
                <th scope="col" class="px-6 py-3">email</th>
                <th scope="col" class="px-6 py-3">pesan</th>
                <th scope="col" class="px-6 py-3">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach($kontaks as $kontak)
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">{{ $no++ }}</td>
                <td class="px-6 py-4">{{ $kontak->nama }}</td>
                <td class="px-6 py-4">{{ $kontak->email }}</td>
                <td class="px-6 py-4">{{ $kontak->pesan }}</td>
                <td class="px-6 py-4">{{ $kontak->created_at ? $kontak->created_at->format('d-m-Y H:i') : '' }}</td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>
    {{ $kontaks->links() }}
@endsection