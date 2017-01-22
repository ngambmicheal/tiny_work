<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class store extends Model
{
    //
    function categories(){
    	return $this->hasMany('App\product_category');
    }

    function employees(){
    	return $this->hasMany('App\employee');
    }

    function style(){
    	return $this->hasOne('App\style');
    }

    function policies(){
    	return $this->hasMany('App\policies');
    }

    function sales(){
        return $this->hasMany('App\sale');
    }

    function products(){
        return $this->hasMany('App\product');
    }

    function reviews(){
        return $this->hasMany('App\review');
    }

    function employment_requests(){
        return $this->hasMany('App\employee_proposal');
    }

    function posts(){
        return $this->hasMany('App\post');
    }

    function users(){
        return $this->hasMany('App\link_to_store');
    }

}
