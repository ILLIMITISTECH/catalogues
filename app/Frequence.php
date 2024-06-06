<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Frequence extends Model
{
    //

    protected $fillable = [  
		'libelle'
    ];
    
    public function indicateurs(){
        return $this->hasMany(Indicateur::class);  
    }
    
     
}
