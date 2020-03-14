<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'reviews';

    public function user()
    {
        $this->belongsTo('App\User');
    }
}
