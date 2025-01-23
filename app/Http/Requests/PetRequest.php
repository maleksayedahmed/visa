<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|boolean',
            'pet_category_id' => 'required|exists:pets_categories,id',
            'status' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => __('validation.user_required'),
            'user_id.exists' => __('validation.user_exists'),
            'name.required' => __('validation.name_required'),
            'age.required' => __('validation.age_required'),
            'gender.required' => __('validation.gender_required'),
            'pet_category_id.required' => __('validation.category_required'),
            'status.required' => __('validation.status_required'),
            'image.image' => __('validation.image_valid'),
        ];
    }
}
