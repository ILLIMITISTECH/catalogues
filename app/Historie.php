<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historie extends Model
{
    //

    protected $fillable = [  
		'note','user_id'
    ];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function agent(){
        return $this->belongsTo(Agent::class);
    }
}
