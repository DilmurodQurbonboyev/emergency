<?php

namespace App\Http\Requests;

use App\Services\MessageService;
use Illuminate\Foundation\Http\FormRequest;

class ListsRequest extends FormRequest
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
            'pdf_title_oz' => 'max:255|nullable',
            'pdf_title_uz' => 'max:255|nullable',
            'pdf_title_ru' => 'max:255|nullable',
            'pdf_title_en' => 'max:255|nullable',
            'lists_category_id' => 'required',
            'link' => (request()['list_type_id'] == 6) || request()['list_type_id'] == 4 ? 'required' : ''
        ];
    }

    public function messages(): array
    {
        return [
            'max' => MessageService::tr('No more than 255 characters'),
            'required_without_all' => MessageService::tr('At least one language should be filled'),
            'lists_category_id.required' => MessageService::tr('The Category field is required'),
            'link.required' => tr('The Link field is required')
        ];
    }
}
