<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    //

    public function formations(){
        return $this->hasMany(Formation::class);  
    }
}
