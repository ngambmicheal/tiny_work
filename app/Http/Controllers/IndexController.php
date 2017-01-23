<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\store;
use App\review;
use App\product;
use DB;
use App\link_to_store;
use Auth;
use App\employee_proposal as emp;
use App\User;

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
        $stores = store::all();             //get all stores and return to view
    	return view('front.storelist', compact('stores'));
    }

    public function storelist_cat($id){
        $stores = store::where(['category_id'=>$id])->get();             //get all stores of a particular category and return to view
        return view('front.storelist', compact('stores'));
    }

    public function show_store($username){
        $store = store::where(['username'=>$username])->first();

        return view('front.store.show', compact('store'));
    }

    public function show_store_products($username, $id=null){
        $store = store::where(['username'=>$username])->first();

        if(!$id) $products = $store->products;
        
        else{
            $product = product::find($id);

            return view('front.store.single', compact('product','store'));
        }

        return view('front.store.products', compact('products', 'store'));
    }

     public function show_store_category($username, $id=null){
        $store = store::where(['username'=>$username])->first();

        if(!$id) $products = $store->products;
        else     $products = $store->products->where('category_id', $id);

        return view('front.store.products', compact('products', 'store'));
    }



    public function show_store_sales($username, $id=null){
        $store = store::where(['username'=>$username])->first();

        if(!$id) $sales = $store->sales;
        else     $sales = $store->sales->where('id', $id);

      //  return $sales;

        return view('front.store.sales', compact('sales','store'));
    }

    public function store_employment($username, $view=null){
        $store = store::where(['username'=>$username])->first();
        return view('front.store.employment', compact('store', 'view'));
    }

    public function save_reviews(Request $request){
        $review = new review;

        $review->store_id = $request->rev_store;
        $review->rev_name = $request->rev_name;
        $review->rev_email = $request->rev_email;
        $review->rev_rev   = $request->rev_rev;
        $review->rev_star  = $request->rev_star;
        $review->save();

        return 'Successful';
    }

    public function contact(){
        return view('front.contact');
    }

    public function create_store(){

        return view('front.create_store');
    }

    public function save_store(Request $request){

    $check = store::where(['username'=>$request->storeusername])->first();

    if($check){
        return redirect()->back()->with('error', 'Username already exists')->withInputs();
    }
        $store = new store;
        $store->username = $request->storeusername;
        $store->name = $request->storename;
        $store->category_id = $request->category;
        $store->phone = $request->storephcontact;
        $store->mobile = $request->storecontact;
        $store->location = $request->location;
        $store->email = $request->email;

        if($store->save()){


        DB::statement("INSERT INTO styles
(store_id, a, a_hover, a_click, btn, btn_hover, txt_border, txt_border_hover, txt_border_focus, top_menu, top_menu_hover, top_menu_active, side_menu, side_menu_hover, side_menu_active, top_social_media, footer, important_span, heading, fc_action, top_menu_running, side_menu_running, breadcrumb, breadcrumb_a) 
VALUES ($store->id,'#ffad1f','#00B2ED','#00B2ED','#00B2ED','#ffad1f','#d3d3d3','#00B2ED','#ffad1f','#000000','#ffad1f','#ffad1f','#00B2ED','#ffad1f','#ffad1f','#ffad1f','#00B2ED','#ffad1f','#ffad1f','#ffad1f','#ffad1f','#ffad1f','#fff7ea','#ffad1f')");

        //DB::statement("INSERT INTO  store_employment_table (store_id) VALUES ($store->id)");

        $link = new link_to_store;

        $link->store_id = $store->id;
        $link->user_id = Auth::user()->id;
        $link->save();

        return redirect('/store/settings/');

        }

        else{
            return redirect()->back()->with('error', "An Error Occured, please contact the administrator");
        }

    }


    public function complete_profile(Request $request){
        $user = Auth::user();

        $user->update($request->all());

        $user->profile='Complete';
        $user->save();    
    }

    public function application(Request $request){

        $check = emp::where(['user_id'=>$request->user, 'store_id'=>$request->store])->first();

        if($check) return ['error'=>'yes','message'=>'You have already applied to this store'];
        $check = emp::where(['user_id'=>$request->user])->where('status','!=','pending')->get();

        if(count($check)>2){
            return ['error'=>'yes','message'=>'You have already 2 pending applications'];
        }

        $emp = new emp;
        $emp->user_id = $request->user;
        $emp->store_id = $request->store;
        $emp->salary = $request->prop_sal;
        $emp->message = $request->prop_message;

        $emp->save();

        return ['error'=>'no','message'=>'You have applied. Wait till your store replies. Good luck!'];
    }


}


