<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuisine extends Model
{
    protected $fillable = [
        'cuisinename',
        'active',
    ];
        
    protected $table = "cuisine";

    public $timestamps  = false;

    
    public function location() {
        return $this->belongsToMany('App\Models\Place', 'place_cuisine', 'cuisine_id', 'place_id');
    } 
    
}
