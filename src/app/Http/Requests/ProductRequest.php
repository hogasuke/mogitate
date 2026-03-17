<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'price' => ['required', 'integer', 'min:0', 'max:10000'],
            'image' => ['required', 'file', 'mimes:png,jpeg'],
            'seasons' => ['required', 'array'],
            'description' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '価格を入力してください',
            'price.integer' => '数値で入力してください',
            'price.min' => '0〜10000円以内で入力してください',
            'price.max' => '0〜10000円以内で入力してください',
            'image.required' => '商品画像を登録してください',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
            'seasons.required' => '季節を選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max' => '120文字以下で入力してください',
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {

            if (!$this->filled('price')) {
                $validator->errors()->add('price', '数値で入力してください');
                $validator->errors()->add('price', '0〜10000円以内で入力してください');
            }

            if (!$this->hasFile('image')) {
                $validator->errors()->add('image', '「.png」または「.jpeg」形式でアップロードしてください');
            }

            if (!$this->filled('description')) {
                $validator->errors()->add('description', '120文字以下で入力してください');
            }
        });
    }
}