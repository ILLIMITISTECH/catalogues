<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    //
     protected $fillable = [  
		'libelle','deadline','visibilite','note','risque', 'delais','reunion','agent','agent_id','direction_id','status','reunion_id','responsable','bakup','raison','indicateur_id','action_respon','status','user_id'
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }
    
    public function indicateur(){
        return $this->belongsTo(Indicateur::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function reunion(){
        return $this->belongsTo(Reunion::class);
    }

    public function suivi_actions(){
        return $this->hasMany(Suivi_action::class);  
    }
    
    public function direction(){
        return $this->belongsTo(Direction::class);
    }
}
