@extends('layouts.appadmin')
@section('tittle', 'daftar kontaks - admin')
@section('content')

<div class="container mx-auto p-4 mt-20">
    <h1 class="text-2xl font-bold mb-4">daftar kontak masuk</h1>
    @include ('components.table_kontak' , ['kontak'=> $kontaks])
</div>
@endsection
