<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cuisine;

class Place extends Model
{
    protected $fillable = [
        'placename',
        'location',
        'active'
    ];

    public $timestamps  = false;

    protected $table = "place";

    public function cuisine()
    {
        return $this->belongsToMany('App\Models\Cuisine', 'place_cuisine', 'place_id', 'cuisine_id');
    }

    public function visit()
    {
        return $this->hasMany('App\Models\Visit');
    }

}
