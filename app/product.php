<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //

    function images(){
    	return $this->hasMany('App\images');
    }

   
}
