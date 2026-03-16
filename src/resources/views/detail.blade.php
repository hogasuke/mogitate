@extends('layouts.app')

@section('content')
    <div style="max-width: 1000px; margin: 40px auto; padding: 20px;">
        <p>
            <a href="/">商品一覧</a> ＞ {{ $product->name }}
        </p>

        <h1>{{ $product->name }}</h1>

        <div style="margin-top: 20px;">
            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                style="width: 400px; max-width: 100%; display: block;">
        </div>

        <div style="margin-top: 20px;">
            <p><strong>商品名:</strong> {{ $product->name }}</p>
            <p><strong>価格:</strong> ¥{{ number_format($product->price) }}</p>
            <p><strong>商品説明:</strong></p>
            <p>{{ $product->description }}</p>
        </div>
    </div>
@endsection