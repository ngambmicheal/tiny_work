<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Auth;
use App\User;

class LoginController extends Controller
{
    //

    public function signin(Request $request){

    	//$request contains all the parameters sent as get or post e.g $request->name = $_GET['name']

    	$email = $request->email;
    	$password = $request->password;

    //try to login with email or username
    	if(Auth::attempt(['email'=>$email, 'password'=>$password]) || Auth::attempt(['username'=>$email, 'password'=>$password])  ){

            if(Auth::user()->privilege=='Owner' && !Auth::user()->stores){
                return redirect()->to('/create_store')->with('message', "Open Your Store");
            }
            if(Auth::user()->privilege!="Owner" && !Auth::user()->stores){
                return redirect()->to('/storelist');
            }
    	
    		return redirect()->intended('/store/profile')->with('message', 'Login Successful!');
    	}

    	else{
    		return redirect()->back()->with('error', 'Wrong Email/password');
    	}
    }

     public function login_as_employee(Request $request){

        //$request contains all the parameters sent as get or post e.g $request->name = $_GET['name']

        $email = $request->email;
        $password = $request->password;

    //try to login with email or username
        if(Auth::attempt(['email'=>$email, 'password'=>$password]) || Auth::attempt(['username'=>$email, 'password'=>$password] )  ){

            if(Auth::user()->privilege!='employee') return redirect()->back()->with('error', 'Sorry, This is not an employee account');

            return redirect()->back()->with('message', 'Login Successful!')->with('apply','apply');
        }

        else{
            return redirect()->back()->with('error', 'Wrong Email/password');
        }
    }


    public function register(RegisterRequest $request){   

    	$user = new User;				//create new user
    	$user->username = $request->username;
    	$user->email    = $request->email;
    	$user->password = bcrypt($request->password);
        $user->privilege = 'Owner';
    	if($user->save()){			//if user was created

    		Auth::login($user);		//login the user
    		return redirect()->to('/create_store')->with('message', "You Successful Registered!")->with('apply','apply');

    	}

    }

       public function register_as_employee(RegisterRequest $request){   

        $user = new User;               //create new user
        $user->username = $request->username;
        $user->email    = $request->email;
        $user->password = bcrypt($request->password);
        $user->privilege = 'employee';
        if($user->save()){          //if user was created

            Auth::login($user);     //login the user
            return redirect()->back()->with('message', "You Successful Registered!")->with('apply','apply');

        }

    }

    public function register_success(){
    	return view('front.register_success');
    }

    public function logout(){
    	Auth::logout();

    	return redirect()->to('/');
    }
}
