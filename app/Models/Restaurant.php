<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';

	protected $fillable = ['name','website','slug','email','active'];

    //Un restaurante puede tener muchas direcciones
    public function addresses()
    {
        return $this->hasMany('App\Models\Address');
    }

	/*
    public function setSlugAttribute($value)
    {
    	//Buscar el slug en la base de datos, de existir, se añade un número random de 5 dígitos

    	$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $value), '-'));

    	$slugExists = Restaurant::where('slug', $slug)->count();

    	if ($slugExists) {

    	}

        $this->attributes['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
    }
    */
}
