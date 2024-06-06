<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reunion extends Model
{
    //
    protected $fillable = [  
        'date','nombre_partici','liste','heure_debut','heure_fin'
        ];

    public function actions(){
        return $this->hasMany(Action::class);  
    }

    public function decissions(){
        return $this->hasMany(Decission::class);  
    }
}
