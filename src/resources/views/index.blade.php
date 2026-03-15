@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="product__content">
        <div class="product__heading">
            <h2 class="product__title">商品一覧</h2>
            <button class="product-register-button" onclick="location.href='/register'">+ 商品を追加</button>
        </div>

        <div class="product__wrapper">
            <aside class="sidebar">
                <form class="search-form" action="/" method="get">
                    <div class="search-form__group">
                        <input class="search-form__input" type="text" name="keyword" placeholder="商品名で検索">
                    </div>
                    <button class="search-form__button" type="submit">検索</button>
                </form>

                <form class="sort-form" action="/" method="get">
                    <h3 class="sort-form__title">価格順で表示</h3>
                    <select class="sort-form__select" name="sort">
                        <option value="">価格で並べ替え</option>
                        <option value="asc">低い順に表示</option>
                        <option value="desc">高い順に表示</option>
                    </select>
                </form>
            </aside>

            <div class="main-content">
                <div class="product-list">
                    @foreach ($products as $product)
                        <div class="product-card">
                            <div class="product-card__image-wrapper">
                                <img
                                    class="product-card__image"
                                    src="{{ asset('storage/' . $product->image) }}"
                                    alt="{{ $product->name }}">
                            </div>
                            <div class="product-card__body">
                                <p class="product-card__name">{{ $product->name }}</p>
                                <p class="product-card__price">¥{{ number_format($product->price) }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection