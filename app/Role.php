<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [  
		'nom_role'
    ];
    public function users(){
        return $this->hasMany(User::class);  
    }
}
