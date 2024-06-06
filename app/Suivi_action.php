<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suivi_action extends Model
{ 
    //
    
      protected $fillable = [  
		'deadline','pourcentage','note','action','action_id','delais'
    ];

    public function action(){
        return $this->belongsTo(Action::class);
    }
}
