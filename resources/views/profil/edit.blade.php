@extends('layouts.app2')
@section('content')

<head>
    <meta charset="UTF-8">
    <title>Edit Profil</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="/public/style/flowbite.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('style/custom.css') }}">

</head>
<body class="bg-gray-50 min-h-screen">

<div class="max-w-2xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-semibold mb-6 text-center">Edit Profil Pengguna</h2>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded p-6">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
            <input type="text" name="name" id="name"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('name') border-red-500 @enderror"
                   value="{{ old('name', $user['name']) }}">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <input type="text" name="description" id="description"
                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   value="{{ old('description', $user['description']) }}">
        </div>

        <div class="mb-4">
            <label for="profile_photo" class="block text-sm font-medium text-gray-700">Foto Profil</label>
            <input type="file" name="profile_photo" id="profile_photo"
                   class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"/>

          @if (!empty($user['profile_photo']))
         <img src="{{ asset('storage/' . $user['profile_photo']) }}" alt="Foto Profil" class="mt-4 w-24 h-24 rounded-full object-cover">
         @endif

        </div>

        <div class="flex justify-between items-center">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Simpan Perubahan
            </button>
            <a href="{{ route('profil.show') }}" class="text-gray-600 hover:underline">Kembali</a>
        </div>
    </form>
</div>

<script src="/public/js/flowbite.min.js"></script>
</body>
</html>
