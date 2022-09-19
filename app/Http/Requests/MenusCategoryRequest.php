<?php

namespace App\Http\Requests;

use App\Models\MenusCategory;
use Illuminate\Foundation\Http\FormRequest;

class MenusCategoryRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title_oz' => 'max:255|required_without_all:title_uz,title_ru,title_en',
            'title_uz' => 'max:255|required_without_all:title_oz,title_ru,title_en',
            'title_ru' => 'max:255|required_without_all:title_oz,title_uz,title_en',
            'title_en' => 'max:255|required_without_all:title_oz,title_uz,title_ru',
        ];
    }

    public function messages(): array
    {
        return [
            'max' => tr("The field must not be greater than 255 characters."),
            'required_without_all' => tr('At least one language should be filled'),
        ];
    }
}
