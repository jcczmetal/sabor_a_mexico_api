<?php

namespace App\Http\Controllers\Restaurants;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocalManagementController extends Controller
{
    public function show()
    {
        //Mostrar el restaurante de acuerdo al user que ingresa, validando con Auth la pertenencia del restaurante
    }

    public function edit()
    {
        //Misma data que show pero en formulario para editar 
    }

    public function update(Request $request)
    {
        //validar y guardar cambios
    }
}
