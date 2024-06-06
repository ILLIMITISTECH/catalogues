<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    //

    public function formation(){
        return $this->belongsTo(Formation::class);
    }

    public function agents(){
        return $this->belongsToMany(Agent::class);
    }
}
