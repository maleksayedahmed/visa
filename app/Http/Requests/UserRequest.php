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
            'name' => 'required|string|max:255',
            'role' => 'required',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($isUpdate ? $this->user : null),
            ],
            'phone' => [
                'nullable',
                Rule::unique('users', 'phone')->ignore($isUpdate ? $this->user : null),
            ],
            'gender' => 'required|boolean',
            'birth_date' => 'nullable|date',
            'is_blocked' => 'nullable',
            'is_activated' => 'nullable',
            'wallet' => 'nullable|numeric|min:0',

            'addresses.*.description' => 'required|array',
            'addresses.*.type' => 'required|in:home,work',
            'addresses.*.street_no' => 'required|string|max:255',
            'addresses.*.building_no' => 'required|string|max:255',
            'addresses.*.country_id' => 'required|exists:countries,id',
            'addresses.*.city_id' => 'required|exists:cities,id',
            'addresses.*.area_id' => 'required|exists:areas,id',
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

