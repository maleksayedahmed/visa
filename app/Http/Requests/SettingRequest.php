<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to false if you want to restrict access
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'mobile_number' => ['nullable', 'string', 'max:20'],

            // Translatable fields (English & Arabic)
            'contact_us.en' => ['required', 'string', 'max:1000'],
            'contact_us.ar' => ['required', 'string', 'max:1000'],

            'terms_and_condition.en' => ['required', 'string', 'max:2000'],
            'terms_and_condition.ar' => ['required', 'string', 'max:2000'],

            'about_us.en' => ['required', 'string', 'max:3000'],
            'about_us.ar' => ['required', 'string', 'max:3000'],

            'facebook' => ['nullable', 'url', 'max:255'],
            'x' => ['nullable', 'url', 'max:255'],
            'instagram' => ['nullable', 'url', 'max:255'],
            'whatsapp' => ['nullable', 'string', 'max:20'],
        ];
    }

    /**
     * Custom error messages (optional)
     */
    public function messages(): array
    {
        return [
            'contact_us.en.required' => 'The Contact Us (English) field is required.',
            'contact_us.ar.required' => 'The Contact Us (Arabic) field is required.',
            'terms_and_condition.en.required' => 'The Terms and Conditions (English) field is required.',
            'terms_and_condition.ar.required' => 'The Terms and Conditions (Arabic) field is required.',
            'about_us.en.required' => 'The About Us (English) field is required.',
            'about_us.ar.required' => 'The About Us (Arabic) field is required.',
        ];
    }
}
