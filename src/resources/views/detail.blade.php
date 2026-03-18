@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/detail.css') }}">
@endsection

@section('content')
    <div class="product-detail">
        <div class="product-detail__breadcrumb">
            <a href="{{ route('products.index') }}">商品一覧</a>
            <span>></span>
            <span>{{ $product->name }}</span>
        </div>

        <form class="product-detail__form" action="{{ route('products.update', $product->id) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="product-detail__top">
                <div class="product-detail__image-area {{ session()->hasOldInput() ? 'product-detail__image-area--error' : '' }}">
                    <div class="product-detail__image-wrapper {{ session()->hasOldInput() ? 'product-detail__image-wrapper--empty' : '' }}">
                        <img
                            class="product-detail__image"
                            id="preview-image"
                            src="{{ session()->hasOldInput() ? '' : asset('storage/' . $product->image) }}"
                            alt="{{ session()->hasOldInput() ? '' : $product->name }}">
                    </div>

                    <div class="product-detail__file">
                        <label class="file-button">
                            ファイルを選択
                            <input type="file" name="image" id="image-input">
                        </label>
                        <span class="file-name" id="file-name">
                            {{ session()->hasOldInput() ? '' : basename($product->image) }}
                        </span>
                    </div>

                    <div class="product-detail__image-errors"  id="image-errors">
                        @foreach ($errors->get('image') as $message)
                            <p class="form__error">{{ $message }}</p>
                        @endforeach
                    </div>
                </div>

                <div class="product-detail__info">
                    <div class="form__group">
                        <label class="form__label" for="name">商品名</label>
                        <input
                            class="form__input"
                            type="text"
                            id="name"
                            name="name"
                            placeholder="商品名を入力"
                            value="{{ old('name', $product->name) }}">

                        @foreach ($errors->get('name') as $message)
                            <p class="form__error">{{ $message }}</p>
                        @endforeach
                    </div>

                    <div class="form__group">
                        <label class="form__label" for="price">値段</label>
                        <input
                            class="form__input"
                            type="text"
                            id="price"
                            name="price"
                            placeholder="値段を入力"
                            value="{{ old('price', $product->price) }}">

                        @foreach ($errors->get('price') as $message)
                            <p class="form__error">{{ $message }}</p>
                        @endforeach
                    </div>

                    <div class="form__group">
                        <p class="form__label">季節</p>
                        <div class="season-list">
                            @foreach ($seasons as $season)
                                <label class="season-list__item">
                                    <input
                                        type="checkbox"
                                        name="seasons[]"
                                        value="{{ $season->id }}"
                                        {{ in_array($season->id, old('seasons', session()->hasOldInput() ? [] : $product->seasons->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <span>{{ $season->name }}</span>
                                </label>
                            @endforeach
                        </div>

                        @foreach ($errors->get('seasons') as $message)
                            <p class="form__error">{{ $message }}</p>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="form__group form__group--description">
                <label class="form__label" for="description">商品説明</label>
                <textarea
                    class="form__textarea"
                    id="description"
                    name="description"
                    rows="8"
                    placeholder="商品の説明を入力">{{ old('description', $product->description) }}</textarea>

                @foreach ($errors->get('description') as $message)
                    <p class="form__error">{{ $message }}</p>
                @endforeach
            </div>

            <div class="product-detail__actions">
                <div class="product-detail__main-buttons">
                    <a href="{{ route('products.index') }}" class="button button--back">戻る</a>
                    <button type="submit" class="button button--save">変更を保存</button>
                </div>
            </div>
        </form>

        @if (!session()->hasOldInput())
            <form
                class="product-detail__delete-form"
                action="{{ route('products.destroy', $product->id) }}"
                method="post"
                onsubmit="return confirm('本当に削除しますか？');">
                @csrf
                @method('DELETE')

                <button type="submit" class="button button--delete" aria-label="削除">
                    <svg
                        class="delete-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 -960 960 960"
                        fill="currentColor">
                        <path
                            d="M261-120q-24.75 0-42.37-17.63Q201-155.25 201-180v-570h-41v-60h188v-30h264v30h188v60h-41v570q0 24-18 42t-42 18H261Zm438-630H261v570h438v-570ZM367-266h60v-399h-60v399Zm166 0h60v-399h-60v399Z" />
                    </svg>
                </button>
            </form>
        @endif
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const fileInput = document.getElementById("image-input");
            const fileName = document.getElementById("file-name");
            const previewImage = document.getElementById("preview-image");
            const imageErrors = document.getElementById("image-errors");

            if (!fileInput || !fileName || !previewImage) {
                return;
            }

            fileInput.addEventListener("change", function () {
                if (fileInput.files.length > 0) {
                    const file = fileInput.files[0];
                    fileName.textContent = file.name;

                    const imageURL = URL.createObjectURL(file);
                    previewImage.src = imageURL;

                    const wrapper = previewImage.closest('.product-detail__image-wrapper');
                    const imageArea = previewImage.closest('.product-detail__image-area');

                    if (wrapper) {
                        wrapper.classList.remove('product-detail__image-wrapper--empty');
                    }

                    if (imageArea) {
                        imageArea.classList.remove('product-detail__image-area--error');
                    }

                    if (imageErrors) {
                        imageErrors.innerHTML = '';
                    }
                }
            });
        });
    </script>
@endsection