<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Address extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = 'addresses';

    protected $fillable = [
    	'restaurant_id',
        'branch',
        'slug',
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
