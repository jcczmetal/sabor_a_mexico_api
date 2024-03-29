<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 'photos';

	protected $fillable = ['address_id','title','comment'];

    //Un restaurante puede tener muchas fotografías
    public function address()
    {
        return $this->belongsTo('App\Models\address');
    }
}
