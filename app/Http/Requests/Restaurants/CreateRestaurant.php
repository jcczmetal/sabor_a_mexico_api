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
            'newrestaurant_slug'      => 'required',
            'newrestaurant_website'   => 'required',
            'newrestaurant_phone'     => 'required',
            'newrestaurant_email'     => 'required',
            //Falta definir ciertas reglas, esto posiblemente vaya activo por default
            'newrestaurant_active'    => 'required',

            'newrestaurant_address'   => 'required', //Av Cuauhtemoc colonia centro, CDMX, CP.440404

            //
            'newrestaurant_latitude'  => 'required',
            'newrestaurant_longitude' => 'required'
        ];
    }
}
