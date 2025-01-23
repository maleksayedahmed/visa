<?php

namespace App\Http\Requests;

use App\Models\Doctor;
use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Allow all authenticated users
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|array',
            'title.*' => 'required|string',
            'product_id' => 'required|exists:products,id',
            'description' => 'required|array',
            'description.*' => 'required|string',
            'link' => 'nullable|url',
            'image' => 'nullable|image',
            'status' => 'required|boolean',


        ];
    }


}
