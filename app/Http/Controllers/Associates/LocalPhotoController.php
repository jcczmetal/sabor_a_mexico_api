<?php

namespace App\Http\Controllers\Associates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalPhotoController extends Controller
{
    public function index()
    {
        //Mostrar fotos del restaurante de acuerdo al user que ingresa, validando con Auth la pertenencia del restaurante
    }

    public function store(Request $request)
    {
        //Validar archivo para almacenar. Posible necesidad de manejar cuantas fotos se pueden almacenar
    }

    public function destroy($id)
    {
        //Seleccionar una foto y destruirla.
    }
}
