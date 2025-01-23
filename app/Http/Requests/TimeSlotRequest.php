<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeSlotRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'type' => 'required|in:morning,evening',
            'time' => 'required|date_format:H:i',
            'time_type' => 'required|in:AM,PM',
            'status' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'type.required' => __('validation.type_required'),
            'type.in' => __('validation.type_invalid'),
            'time.required' => __('validation.time_required'),
            'time.date_format' => __('validation.time_format_invalid'),
            'time_type.required' => __('validation.time_type_required'),
            'time_type.in' => __('validation.time_type_invalid'),
            'status.required' => __('validation.status_required'),
        ];
    }
}
