<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    //

    public function agent(){
        return $this->belongsTo(Agent::class);
    }

    public function theme(){
        return $this->belongsTo(Theme::class);
    }

    public function modules(){
        return $this->hasMany(Module::class);  
    }
}
