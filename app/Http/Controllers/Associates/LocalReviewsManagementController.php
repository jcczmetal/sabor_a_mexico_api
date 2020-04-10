<?php

namespace App\Http\Controllers\Associates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LocalReviewsManagementController extends Controller
{
    public function index()
    {
        //Mostrar reviews del restaurante de acuerdo al user que ingresa, validando con Auth la pertenencia del restaurante
        

    }

    public function edit($id)
    {
        //Mostrar review del restaurante de acuerdo al user que ingresa, validando con Auth la pertenencia del restaurante
    }

    public function update(Request $request)
    {
        //Validar archivo para almacenar. Posible necesidad de manejar cuantas fotos se pueden almacenar
    }

    public function destroy($id)
    {
        //Seleccionar una foto y destruirla.
    }
}
