@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <aside class="sidebar">
        サイドバー
    </aside>
    <div class="main-content">
        メインコンテンツ
    </div>
@endsection