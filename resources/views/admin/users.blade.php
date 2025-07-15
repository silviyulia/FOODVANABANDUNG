@extends('layouts.appadmin')

@section('tittle','daftar users - admin')

@section('content')
<div class="container mx-auto p-4 mt-20">
        @include ('components.table_users' , ['users' => $users ])
</div>
@endsection