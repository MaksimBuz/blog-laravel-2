<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogCategoryCreateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'=>'required|min:5|max:200',
            'slug'=>'max:200',
            'description'=>'string|min:5',
            'parent_id'=>'integer'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Введите заголовок статьи',
            'title.min'=>'Минимальная длинна 5 символов',
            'slug.required'=>'Введите заголовок статьи',
            'slug.max'=>'Максимальная длинна 200 символов',
            'description.string'=>'Должно быть строкой',
            'description.min'=>'МИнимальное число символов 5',
        ];
    }
}
