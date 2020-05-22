<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['user_id','address_id','review','visit_type','ranking'];

    public function address()
    {
        $this->belongsTo('App\Models\Address');
    }

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
