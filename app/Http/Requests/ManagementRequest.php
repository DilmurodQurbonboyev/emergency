<?php

namespace App\Http\Requests;

use App\Services\MessageService;
use Illuminate\Foundation\Http\FormRequest;

class ManagementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'leader_oz' => 'max:255|required_without_all:leader_uz,leader_ru,leader_en',
            'leader_uz' => 'max:255|required_without_all:leader_oz,leader_ru,leader_en',
            'leader_ru' => 'max:255|required_without_all:leader_oz,leader_uz,leader_en',
            'leader_en' => 'max:255|required_without_all:leader_oz,leader_uz,leader_ru',
            'm_category_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'max' => MessageService::tr('No more than 255 characters'),
            'required_without_all' => MessageService::tr('At least one language should be filled'),
            'm_category_id.required' => MessageService::tr('The Category field is required'),
        ];
    }
}
