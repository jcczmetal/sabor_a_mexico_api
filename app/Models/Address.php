<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\DB;

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

    public function scopeNearTo($query, $lat, $lng)
    {
        $query->select(DB::raw('*, ( 6367 * acos( cos( radians('.$lat.') ) * cos( radians( latitude ) ) * cos( radians( longitude ) - radians('.$lng.') ) + sin( radians('.$lat.') ) * sin( radians( latitude ) ) ) ) AS distance'))
            ->having('distance', '<', 25)
            ->orderBy('distance');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb-mobile')
              ->width(150)
              ->height(150);

        $this->addMediaConversion('cover-mobile')
              ->width(800)
              ->height(600);
    }
}
