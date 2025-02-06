<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Set to false if you want to restrict access
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile_number' => 'nullable|string|max:20',
            'contact_us' => 'nullable|string|max:255',
            'terms_and_condition' => 'nullable|string|max:255',
            'facebook' => 'nullable|url|max:255',
            'x' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'about_us' => 'nullable|string',
        ];
    }
}
