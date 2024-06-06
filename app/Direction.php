<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    //

    protected $fillable = [  
		'nom_direction','abreviation'
    ];
    public function services(){
        return $this->hasMany(Service::class);  
    }
    
    public function agents(){
        return $this->hasMany(Agent::class);  
    }
    
     public function actions(){
        return $this->hasMany(Action::class);  
    }
    
    public function indicateurs(){
        return $this->hasMany(Indicateur::class);  
    }
    
     
}
