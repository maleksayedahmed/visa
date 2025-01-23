<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // Determine if the request is for "store" or "update"
        $isUpdate = $this->isMethod('put') || $this->isMethod('patch');

        $rules = [
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'title' => 'required|array',
            'title.*' => 'string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'status' => 'required|string|in:0,1',
            'description' => 'required|nullable|array',
            'items.*.model_type' => 'nullable|exists:model_types,id',
            'items.*.model_types_data' => 'nullable|exists:model_types_data,id',
            'items.*.model_type_details' => 'nullable|string',
        ];

        if (!$isUpdate) {
            // Additional rules for "store"
            $rules['password'] = 'required|min:8|confirmed';
        } else {
            // Additional rules for "update"
            $rules['password'] = 'nullable|min:8|confirmed'; // Optional password update
        }

        return $rules;
    }
}

