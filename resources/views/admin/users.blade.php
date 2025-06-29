@extends('layouts.appadmin')

@section('tittle','daftar users - admin')

@section('content')
<div class="container mx-auto p-4 pt-6">
     <h1 class="text-2xl font-bold mb-4">Daftar Menu Kuliner</h1>

        @include ('components.table_users' , ['users' => $users ])
</div>
@endsection