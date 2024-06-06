<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Axe extends Model
{
    //

    protected $fillable = [  
		'libelle'
    ];
    
    public function objectifs(){
        return $this->hasMany(Objectif::class);  
    }
    
}
