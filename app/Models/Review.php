<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    protected $fillable = ['user_id','restaurant_id','review','visit_type','ranking'];

    public function restaurant()
    {
        $this->belongsTo('App\Models\Restaurant');
    }

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
