<?php

namespace App\Http\Requests\Restaurants;

use Illuminate\Foundation\Http\FormRequest;

class CreateRestaurant extends FormRequest
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
            'newrestaurant_name'      => 'required',
            'newrestaurant_website'   => 'required',
            'newrestaurant_email'     => 'required'
        ];
    }

    public function messages()
    {
        return [
            'newrestaurant_name.required'    => 'El nombre del restaurant es requerido.',
            'newrestaurant_website.required' => 'El sitio web del restaurante es requerido.',
            'newrestaurant_email.required'   => 'El correo es requerido.'
        ];
    }
}
