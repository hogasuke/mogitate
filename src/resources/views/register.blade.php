@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>商品登録</h2>
        </div>
        <form class="form" action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品名</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="name" placeholder="商品名を入力" />
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">値段</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="number" name="price" placeholder="値段を入力" />
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品画像</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="file" name="image"/>
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">季節</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--checkbox">
                        <label>
                            <input type="checkbox" name="seasons[]" value="1" {{ in_array('1', old('seasons', [])) ? 'checked' : '' }}>春
                        </label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="2" {{ in_array('2', old('seasons', [])) ? 'checked' : '' }}>夏
                        </label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="3" {{ in_array('3', old('seasons', [])) ? 'checked' : '' }}>秋
                        </label>
                        <label>
                            <input type="checkbox" name="seasons[]" value="4" {{ in_array('4', old('seasons', [])) ? 'checked' : '' }}>冬
                        </label>
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品説明</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <textarea name="description" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
                    </div>
                    <div class="form__error">
                        <!--バリデーション機能を実装したら記述します。-->
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button--back" type="button" onclick="location.href='/'">戻る</button>
                <button class="form__button-submit" type="submit">送信</button>
            </div>
        </form>
    </div>
@endsection