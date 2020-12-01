<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => ['required', 'max:255'],
            'email' => ['email:rfc,dns'],
            'logo'  => ['dimensions:min_width=100,min_height=100'],
            'website' => ['url'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Company name is required'),
            'name.max'     => __('Maximum 255 character in company name field'),
            'email'        => __('Please enter a valid email address'),
            'logo'         => __('dimensions should be 100x100 atleast'),
            'website'      => __('Please enter a valid url'),
        ];
    }
}
