<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogPostCreateRequest extends FormRequest
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
            'excerpt'=>'max:500',
            'content_raw'=>'string|min:5',
            'category_id'=>'integer'


        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Введите заголовок статьи',
            'title.min'=>'Минимальная длинна 5 символов',
            'slug.required'=>'Введите заголовок статьи',
            'slug.max'=>'Максимальная длинна 200 символов',
            'excerpt.max'=>'Слишком много символов',
            'content_raw.min'=>'Нужно больше символов',
            'category_id.integer'=>'Должно быть числом'
        ];
    }
}
