<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';

    protected $fillable = [
    	'restaurant_id',
    	'street',
    	'number',
    	'phone',
    	'city',
    	'state',
        'latitude',
        'longitude'
    ];

    public function getCompleteAddressAttribute()
    {
        return "{$this->street} {$this->number}. {$this->city}, {$this->state}";
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }

        //Un restaurante puede tener muchas fotografías
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }

    //Un restaurante puede tener muchas criticas
    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }
}
