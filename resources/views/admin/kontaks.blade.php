@extends('layouts.appadmin')
@section('tittle', 'daftar kontaks - admin')
@section('content')

<div class="container mx-auto p-4 mt-20">
    @include ('components.table_kontak' , ['kontak'=> $kontaks])
</div>
@endsection
