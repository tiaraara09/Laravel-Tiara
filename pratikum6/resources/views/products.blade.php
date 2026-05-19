@extends('layouts.app')

@section('title', 'Daftar Produk')

@section('content')
    <h3>Daftar Produk Praktikum</h3>
    <ul>
        @foreach ($products as $product)
            <li><strong>{{ $product->name }}</strong> - Rp{{ number_format($product->price) }} <br> 
            {{ $product->description }}</li>
            <br>
        @endforeach
    </ul>
@endsection