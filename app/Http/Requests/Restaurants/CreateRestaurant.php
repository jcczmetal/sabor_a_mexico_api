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
            'newrest_name'      => 'required',
            'newrest_slug'      => 'required',
            'newrest_website'   => 'required',
            'newrest_phone'     => 'required',
            'newrest_email'     => 'required',
            //Falta definir ciertas reglas, esto posiblemente vaya activo por default
            'newrest_active'    => 'required',

            'newrest_address'   => 'required', //Av Cuauhtemoc colonia centro, CDMX, CP.440404

            //
            'newrest_latitude'  => 'required',
            'newrest_longitude' => 'required'
        ];
    }
}
