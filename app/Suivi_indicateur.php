<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suivi_indicateur extends Model
{
    //
    protected $fillable = [  
		'date','pourcentage','note','indicateur_id','date_maj','valeur_prec','valeur_act','status','evolution','agent_id','indicateur'
    ];
    public function indicateur(){
        return $this->belongsTo(Indicateur::class);
    }
    
    public function agent(){
        return $this->belongsTo(Agent::class);
    }
}
