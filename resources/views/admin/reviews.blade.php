@extends('layouts.appadmin')

@section('tittle','Ulasan Pelanggan - Admin')

@section('content')
<div class="container mx-auto p-4 pt-6">
    @include ('components.table_reviews' , ['reviews'=> $reviews])
</div>
@endsection