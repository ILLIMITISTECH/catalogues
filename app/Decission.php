<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decission extends Model
{
    //

    protected $fillable = [  
		'libelle','delais','agent','agent_id','reunion', 'reunion_id'
    ];

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function reunion(){
        return $this->belongsTo(Reunion::class);
    }
}
