<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class link_to_store extends Model
{
    //

    function store(){
    	return $this->belongsTo('App\store');
    }

    function user(){
    	return $this->belongsTo('App\user');
    }
}
