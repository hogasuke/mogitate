@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="product-detail">
        <div class="product-detail__breadcrumb">
            <a href="/">商品一覧</a>
            <span>></span>
            <span>{{ $product->name }}</span>
        </div>
        <form class="product-detail__form">
            <div class="product-detail__top">
                <div class="product-detail__image-area">
                    <div class="product-detail__image-wrapper">
                        <img class="product-detail__image" src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}">
                    </div>
                    <div class="product-detail__file">
                        <label class="file-button">
                            ファイルを選択
                            <input type="file" name="image">
                        </label>
                    </div>
                </div>
                <div class="product-detail__info">
                    <div class="form__group">
                        <label class="form__label" for="name">商品名</label>
                        <input class="form__input" type="text" id="name" name="name" value="{{ $product->name }}">
                    </div>
                    <div class="form__group">
                        <label class="form__label" for="price">値段</label>
                        <input class="form__input" type="text" id="price" name="price" value="{{ $product->price }}">
                    </div>
                    <div class="form__group">
                        <p class="form__label">季節</p>
                        <div class="season-list">
                            @foreach ($seasons as $season)
                                <label class="season-list__item">
                                    <input type="checkbox" {{ $product->seasons->contains('id', $season->id) ? 'checked' : '' }} disabled>
                                    <span>{{ $season->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group form__group--description">
                <label class="form__label" for="description">商品説明</label>
                <textarea class="form__textarea" id="description" name="description"
                    rows="8">{{ $product->description }}</textarea>
            </div>
            <div class="product-detail__actions">
                <div class="product-detail__main-buttons">
                    <a href="/" class="button button--back">戻る</a>
                    <button type="submit" class="button button--save">変更を保存</button>
                </div>

                <button type="button" class="button button--delete" aria-label="削除">
                    <svg class="delete-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                        <path d="M9 4.75H15" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" />
                        <path d="M6.75 7H17.25" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" />
                        <path d="M8.25 7.25V18C8.25 18.41 8.59 18.75 9 18.75H15C15.41 18.75 15.75 18.41 15.75 18V7.25"
                            stroke="currentColor" stroke-width="2.4" stroke-linejoin="round" />
                        <path d="M10.5 10V15.25" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" />
                        <path d="M13.5 10V15.25" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" />
                    </svg>
                </button>
            </div>
        </form>
    </div>
@endsection