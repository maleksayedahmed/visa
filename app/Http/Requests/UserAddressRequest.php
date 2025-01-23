<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'description' => 'required|string|max:1000',
            'user_id' => 'required|exists:users,id',
            'area_id' => 'required|exists:areas,id',
            'city_id' => 'required|exists:cities,id',
            'country_id' => 'required|exists:countries,id',
            'type' => 'required|in:home,work',
            'street_no' => 'required|string|max:255',
            'building_no' => 'required|string|max:255',
            'status' => 'required|string',
        ];
    }
}
