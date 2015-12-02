<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $table = "visits";
    public $timestamps  = false;

    public $fillable = [
        'date',
        'place_id'
    ];

    public function place()
    {
        return $this->belongsTo('App\Models\Place');
    }
}
