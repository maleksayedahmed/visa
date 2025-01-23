<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'user_id' => 'nullable|exists:users,id',
            'status' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => __('validation.title_required'),
            'description.required' => __('validation.description_required'),
            'status.required' => __('validation.status_required'),
        ];
    }
}
