<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sale extends Model
{
    //

    function products(){
    	return $this->hasMany('App\invoice');
    }
}
