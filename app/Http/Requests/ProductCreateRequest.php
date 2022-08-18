<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductCreateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'article' => ['required', 'alpha_num', 'max:255', 'unique:products'],
            'name' => ['required', 'min:10', 'max:255'],
            'status' => ['required', Rule::in(['available', 'unavailable'])],
            'data' => ['array', 'nullable']
        ];
    }

    /**
     * @return array
     */

    public function messages()
    {
        return [
            'article.required' => 'Артикул обязателен для заполнения',
            'article.alpha_num' => 'Артикул должен содержать только буквы и цифры',
            'article.max' => 'Артикул должен содержать не более 255 символов',
            'article.unique' => 'Артикул уже существует',

            'name.required' => 'Название обязательно для заполнения',
            'name.min' => 'Название должно содержать не меньше 10 символов',
            'name.max' => 'Название должно содержать не более 255 символов',

            'status.required' => 'Статус обязателен для заполнения',
            'status.in' => 'Для поля Статус доступно два значения (available, unavailable)'
        ];
    }
}
