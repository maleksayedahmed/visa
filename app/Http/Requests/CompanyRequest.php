<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Set to true if no additional authorization logic is needed
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $companyId = $this->route('id'); // Get the company ID if present (for updates)
        // dd($companyId);
        return [
            'name' => 'required|array|max:255',
            'name.*' => 'required|string|max:255',
            'commercial_number' => [
                'required',
                'string',
                'max:50',
                Rule::unique('companies', 'commercial_number')->ignore($companyId),
            ],
            'tax_number' => 'nullable|string|max:50',
            'phone' => 'required|string|max:20',
            'mobile' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'twitter' => 'nullable|url|max:255',
            'country_id' => 'required|exists:countries,id',
            'city_id' => 'required|exists:cities,id',
            'area_id' => 'nullable|exists:areas,id',
            'address' => 'nullable|string|max:500',
            'services' => 'nullable|array',
            'status' => 'nullable|boolean'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => __('validation.company_name_required'),
            'commercial_number.required' => __('validation.commercial_number_required'),
            'commercial_number.unique' => __('validation.commercial_number_unique'),
            'commercial_number.max' => __('validation.commercial_number_max'),
            'tax_number.max' => __('validation.tax_number_max'),
            'phone.required' => __('validation.phone_required'),
            'phone.max' => __('validation.phone_max'),
            'mobile.max' => __('validation.mobile_max'),
            'website.url' => __('validation.website_url'),
            'facebook.url' => __('validation.facebook_url'),
            'instagram.url' => __('validation.instagram_url'),
            'twitter.url' => __('validation.twitter_url'),
            'country_id.required' => __('validation.country_id_required'),
            'country_id.exists' => __('validation.country_id_exists'),
            'city_id.required' => __('validation.city_id_required'),
            'city_id.exists' => __('validation.city_id_exists'),
            'area_id.exists' => __('validation.area_id_exists'),
            'address.max' => __('validation.address_max'),
            'status.required' => __('validation.status_required'),
            'status.boolean' => __('validation.status_boolean'),
        ];
    }
}
