<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function login(){
    	return view('front.login');
    }

    public function register(){
    	return view('front.register');
    }

    public function storelist(){
    	return view('front.storelist');
    }
}
