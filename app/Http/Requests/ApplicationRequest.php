<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'answer' => 'required',
            'status' => 'required',
            'answer_file' => 'required|max:10240',
        ];
    }

    public function messages(): array
    {
        return [
            'answer.required' => tr('Answer field is required'),
            'status.required' => tr('Status field is required'),
            'answer_file.required' => tr('Answer File field is required'),
            'file.max' => tr("The Answer file's size must be no more than 10mb"),
        ];
    }
}
