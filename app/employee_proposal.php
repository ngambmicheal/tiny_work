<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee_proposal extends Model
{
    //
    function user(){
    	return $this->belongsTo('App\User');
    }

    function store(){
    	return $this->belongsTo('App\store');
    }
}
