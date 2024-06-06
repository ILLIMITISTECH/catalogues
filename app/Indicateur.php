<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indicateur extends Model
{
    //

    protected $fillable = [  
		'libelle','cible','pourcentage','compare','valeur','unite','frequence_id','direction_id','agent_id','superieur_id'
    ];

    public function suivi_indicateurs(){
        return $this->hasMany(Suivi_indicateur::class);  
    }
    
    public function actions(){
        return $this->hasMany(Action::class);  
    }
    
        public function objectif(){
        return $this->belongsTo(Objectif::class);
    }
    
        public function direction(){
        return $this->belongsTo(Direction::class);
    }
    
        public function frequence(){
        return $this->belongsTo(Frequence::class);
    }
    
        public function agent(){
        return $this->belongsTo(Agent::class);
    }
}
