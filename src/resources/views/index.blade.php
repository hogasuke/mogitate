@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="product__content">
        <div class="product__heading">
            <h2>商品一覧</h2>
            <button class="product-register-button" onclick="location.href='/register'">+商品を追加</button>
        </div>
        <aside class="sidebar">
            サイドバー
        </aside>
        <div class="main-content">
            メインコンテンツ
        </div>
    </div>
@endsection