<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $fillable = [  
		'nom_service','direction','direction_id'
    ];

    public function direction(){
        return $this->belongsTo(Direction::class);
    }

    public function agents(){
        return $this->hasMany(Agent::class);  
    }
}
