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
    	'zipcode',
    	'city',
    	'state'
    ];

    public function getCompleteAddressAttribute()
    {
        return "{$this->street} {$this->number}. {$this->city}, {$this->state}";
    }

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
}
