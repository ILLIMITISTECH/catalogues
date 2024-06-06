<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objectif extends Model
{
    //

    protected $fillable = [  
		'libelle','deadline','pourcentage','axe_id'
    ];

    /*public function agent(){
        return $this->belongsTo(Agent::class);
    }*/

    public function axe(){
        return $this->belongsTo(Axe::class);
    }
    
    public function objectifs(){
        return $this->hasMany(Objectif::class);  
    }
    
    public function indicateurs(){
        return $this->hasMany(Indicateur::class);  
    }
}
