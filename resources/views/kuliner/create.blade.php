{{-- resources/views/kuliner/create.blade.php --}}

@extends('layouts.appadmin') 
@section('title', 'Tambah Menu Baru - FoodVana Bandung')

@section('content')
<main>
    <div class="container mx-auto px-4 py-6 pt-6">
        <h1 class="text-2xl font-bold mb-4 text-gray-800">Tambah Menu Baru</h1>

        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200">
            <form action="{{ route('kuliner.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid gap-4 mb-4 grid-cols-1 md:grid-cols-2">
                    {{-- Nama Kuliner --}}
                    <div class="col-span-2">
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900">Nama Kuliner</label>
                        <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Masukkan nama kuliner" value="{{ old('nama') }}" required>
                        @error('nama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Harga --}}
                    <div class="col-span-2 md:col-span-1">
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900">Harga</label>
                        <input type="number" name="harga" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 15000" step="0.01" value="{{ old('harga') }}" required>
                        @error('harga')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- {{-- Rating --}}
                    <div class="col-span-2 md:col-span-1">
                        <label for="rating" class="block mb-2 text-sm font-medium text-gray-900">Rating (0-5)</label>
                        <input type="number" name="rating" id="rating" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Contoh: 4.5" step="0.1" min="0" max="5" value="{{ old('rating') }}">
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div> -->

                    {{-- Gambar Kuliner --}}
                    <div class="col-span-2">
                        <label for="gambar" class="block mb-2 text-sm font-medium text-gray-900">Gambar Kuliner</label>
                        <input type="file" name="gambar" id="gambar" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none" required>
                        <p class="mt-1 text-sm text-gray-500" id="file_input_help">PNG, JPG or JPEG (MAX. 2MB).</p>
                        @error('gambar')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi Produk --}}
                    <div class="col-span-2">
                        <label for="deskripsi" class="block mb-2 text-sm font-medium text-gray-900">Deskripsi Produk</label>
                        <textarea id="deskripsi" name="deskripsi" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Tulis deskripsi kuliner di sini" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Tombol Submit dan Kembali --}}
                <div class="flex items-center space-x-4">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Simpan Menu Baru
                    </button>
                    <a href="{{ route('kuliner.index') }}" class="text-gray-900 bg-white border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection
