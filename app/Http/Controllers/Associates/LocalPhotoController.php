<?php

namespace App\Http\Controllers\Associates;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;

class LocalPhotoController extends Controller
{
    public function index()
    {
        //Mostrar fotos del restaurante de acuerdo al user que ingresa, validando con Auth la pertenencia del restaurante
    }

    public function store(Request $request)
    {
        $newPhoto = Address::whereSlug($request->slug)->first();

        $newPhoto->addMedia($request->file)->toMediaCollection();
    }

    public function destroy($id)
    {
        //Seleccionar una foto y destruirla.
    }
}
