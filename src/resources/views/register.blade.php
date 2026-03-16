@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
    <div class="product-register__content">
        <div class="product-register__heading">
            <h2>商品登録</h2>
        </div>
        <form class="form" action="/register" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品名</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}" />
                    </div>
                    <div class="form__error">
                        @error('name')
                            <p>{{ $message }}</p>
                        @enderror
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
                        <input type="number" name="price" placeholder="値段を入力" value="{{ old('price') }}" />
                    </div>
                    <div class="form__error">
                        @error('price')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">商品画像</span>
                    <span class="form__label--required">必須</span>
                </div>
                <div class="form__group-content">
                    <div class="form__image-upload">
                        <div class="form__file-preview">
                            <img id="imagePreview" src="" alt="プレビュー" style="display:none" />
                        </div>
                        <div class="form__file-row">
                            <label for="image" class="form__file-button">ファイルを選択</label>
                            <input type="file" name="image" id="image" accept="image/*" />
                            <div id="fileName" class="form__file-name"></div>
                        </div>
                    </div>
                    <div class="form__error">
                        @error('image')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">季節</span>
                    <span class="form__label--required">必須</span>
                    <span class="form__label--note">複数選択可</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--checkbox">
                        @foreach ($seasons as $season)
                            <label class="season-item">
                                <input type="checkbox" name="seasons[]" value="{{ $season->id }}" {{ in_array($season->id, old('seasons', [])) ? 'checked' : '' }}>
                                <span class="season-circle"></span>
                                <span class="season-name">{{ $season->name }}</span>
                            </label>
                        @endforeach
                    </div>
                    <div class="form__error">
                        @error('seasons')
                            <p>{{ $message }}</p>
                        @enderror
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
                        @error('description')
                            <p>{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button--back" type="button" onclick="location.href='/'">戻る</button>
                <button class="form__button-submit" type="submit">送信</button>
            </div>
        </form>
    </div>
    <script>
        (function () {
            var input = document.getElementById('image');
            var preview = document.getElementById('imagePreview');
            var fileName = document.getElementById('fileName');
            if (!input) return;
            input.addEventListener('change', function (e) {
                var file = this.files && this.files[0];
                if (!file) {
                    preview.src = '';
                    preview.style.display = 'none';
                    preview.parentElement.style.display = 'none';
                    fileName.textContent = '';
                    return;
                }
                var reader = new FileReader();
                reader.onload = function (ev) {
                    preview.src = ev.target.result;
                    preview.parentElement.style.display = 'block';
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
                fileName.textContent = file.name;
            });
        })();
    </script>
@endsection