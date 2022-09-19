<?php

namespace App\Http\Requests;

use App\Services\MessageService;
use Illuminate\Foundation\Http\FormRequest;

class ListCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

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
            'max' => MessageService::tr('No more than 255 characters'),
            'required_without_all' => MessageService::tr('At least one language should be filled'),
        ];
    }
}
