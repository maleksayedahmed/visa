<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string',
            'status' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('validation.title_required'),
            'title.*.required' => __('validation.title_locale_required'),
            'description.*.string' => __('validation.description_locale_invalid'),
            'status.required' => __('validation.status_required'),
        ];
    }
}
