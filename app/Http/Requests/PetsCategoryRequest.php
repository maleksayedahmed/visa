<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetsCategoryRequest extends FormRequest
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
            'description.*' => 'nullable|string|max:1000',
            'status' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('validation.title_required'),
            'title.*.required' => __('validation.title_locale_required'),
            'description.*.max' => __('validation.description_max'),
            'status.required' => __('validation.status_required'),
        ];
    }
}
