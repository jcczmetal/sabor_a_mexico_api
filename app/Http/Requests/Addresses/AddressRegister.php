<?php

namespace App\Http\Requests\Addresses;

use Illuminate\Foundation\Http\FormRequest;

class AddressRegister extends FormRequest
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
            'slug'        => 'required',
            'branch'      => 'required',
            'street'      => 'required',
            'number'      => 'required',
            'city'        => 'required',
            'state'       => 'required',
            'lat'         => 'required',
            'lng'         => 'required',
            'phone'       => 'required'
        ];
    }
}
