<?php

namespace App\Http\Controllers\Associates;


use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LocalManagementController extends Controller
{
    public function show($slug)
    {
        //Mostrar el restaurante de acuerdo al user que ingresa, validando con Auth la pertenencia del restaurante
        $restaurant = Restaurant::where('admin', Auth::loginUsingId(1))
                                ->where('slug', $slug)
                                ->first();
        
        return view('restaurants.show', compact($restaurant));
    }

    public function edit($slug)
    {
        //Misma data que show pero en formulario para editar 
        $restaurant = Restaurant::where('admin', Auth::loginUsingId(1))
                                ->where('slug', $slug)
                                ->first();

        return view('restaurants.edit', $restaurant);
    }

    public function update(Request $request)
    {
        //validar y guardar cambios
    }
}
