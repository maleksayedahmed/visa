<?php

namespace App\Http\Requests;

use App\Rules\WorkingDaysValidation;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
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
            'doctor_specialization_id' => 'required|exists:doctor_specializations,id',
            'company_id' => 'nullable|exists:companies,id',
            'bio' => 'required|array',
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
            'start_work' => 'nullable|date_format:H:i', // Must be in "HH:mm" format
            'end_work' => 'nullable|date_format:H:i|after:start_work', // Must be after start_work
            'detection_time' => 'nullable|integer|min:1', // Must be an integer >= 1
            'working_days' => ['nullable', 'string', new WorkingDaysValidation()],
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

