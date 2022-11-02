<?php

namespace App\Http\Requests;

use App\Services\MessageService;
use Illuminate\Foundation\Http\FormRequest;

class AppealRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'fullname' => 'required|max:255',
            'phone' => 'required',
            'email' => 'required|email',
            'appeal_type' => 'required',
            'address' => 'required',
            'file' => 'required|max:10240',
            '_answer' => 'required|simple_captcha'
        ];
    }

    public function messages(): array
    {
        return [
            'fullname.required' => tr('Fullname field is required'),
            'fullname.max' => tr('Fullname field must be no more than 255'),
            'phone.required' => tr('Phone field is required'),
            'email.required' => tr('Email field is required'),
            'email.email' => tr('Email field should be valid email'),
            'appeal_type.required' => tr('The content of the appeal field is required'),
            'address.required' => tr('Address field is required'),
            '_answer.required' => tr('Captcha field is required'),
            'file.required' => tr("File field is required"),
            'file.max' => tr("The uploaded file's size must be no more than 10mb"),
            'photo.required' => tr("The uploaded file's size must be no more than 10mb"),
        ];
    }
}
