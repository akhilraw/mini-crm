<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
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
            'firstname'  => ['required', 'max:255'],
            'lastname'  => ['required', 'max:255'],
            'email' => ['email:rfc,dns'],
            'company_id'  => ['required'],
            'phone' => ['digits_between:10,11'],
        ];
    }
    public function messages()
    {
        return [
            'firstname.required' => __('first name is required'),
            'lastname.required' => __('last name is required'),
            'name.max'     => __('Maximum 255 character in company name field'),
            'email'        => __('Please enter a valid email address'),
            'phone'      => __('Please enter a valid phone number'),
        ];
    }
}
