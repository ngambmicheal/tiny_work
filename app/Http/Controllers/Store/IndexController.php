<?php

namespace App\Http\Controllers\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\store;
use App\post;
use App\policies as policy;
use App\product;
use Helper;
use App\images;

class IndexController extends Controller
{
    //


    public function settings($view=null){
    	if(!$view) $type='store';
    	$store = Auth::user()->stores;

        if(!$store){
            return redirect()->to('/create_store')->with('message','create_your_store');
        }

        $store = $store->store;

    	$row = $store; 

        $request = new Request;
        if($request->pol_id){$policy = policy::find($request->pol_id);}
        if($view=='style') $style = $store->style;

    	return view('store.settings', compact('type', 'store', 'view', 'row', 'policy', 'style'));
    }

    public function index(){

    	return view('store.index', compact(''));
    }

    public function profile($view=null){
      $store = Auth::user()->stores;

        if(!$store){
            return redirect()->to('/create_store')->with('message','create_your_store');
        }
        $store = $store->store;

        return view('store.profile', compact('view','store'));
    }

    public function add_post(Request $request){
        $post = new post;
        $post->store_id = $request->store;
        $post->user_id  = $request->user;
        $post->store_post = $request->post;
        $post->save();

        return "Successfull";
    }

    public function del_post(Request $request){
        $post = post::find($request->id);
        $post->delete();

        return "Successfull";
    }

    public function store_store(Request $request){
        $store = store::find($request->storeid);

        $store->email = $request->email;
        $store->phone = $request->phone;
        $store->mobile = $request->mobile;
        $store->location = $request->location;

        $store->save();
        return "Successfull";
    }

    public function store_details(Request $request){
        $store = store::find($request->storeid);

        $store->tagline = $request->tagline;
        $store->impressum = $request->impressum;
        $store->description = $request->description;
        $store->achievements = $request->achievements;
        $store->website = $request->website;
        $store->facebook = $request->facebook;
        $store->twitter = $request->twitter;
        $store->instagram = $request->instagram;

        $store->save();
        return "Successfull";
    }

    public function upload_logo(Request $request){
           $store = store::find($request->storeid);
           $filename = $store->username. '-'. date('y-m-d-h-i-s');

        if($request->hasFile('logo')){
            $request->file('logo')->move(public_path().'/uploads/store/logo/',$filename.'.jpg');
        }

        $store->logo = asset('/uploads/store/logo/'.$filename.'.jpg');
        $store->save();

        return $store->logo;
    }

    public function emp_set(Request $request){
        $store = store::find($request->storeid);

        $store->min_wage = $request->min_wage;
        $store->max_wage = $request->max_wage;
        $store->wage_message = $request->message;

        $store->save();

        return "Successfull";
    }

    public function add_pol(Request $request){
        $pol = new policy; 
        $pol->title = $request->title;
        $pol->tag = $request->tag;
        $pol->policy = $request->policy;
        $pol->store_id = $request->storeid; 
        $pol->save();

        return "Successfull";
    }

    public function up_style(Request $request){
        $store = store::find($request->store_id);

        $store->style->update($request->all());

           return "Successfull";

    }

    public function add_product(Request $request){
        $product = new product;
        $product->name = $request->productnames;
        $product->code = $request->productcodes;
        $product->description = $request->productdesc;
        $product->price = $request->productprices;
        $product->quantity = $request->productquantities;
        $product->discount_price = $request->productdiscounts;
        $product->category_id = $request->productcategories;
        $product->store_id = $request->store_id;
        $product->save();

        if($request->hasFile('productimages1')){
            $filename = $product->code.'-'.date('y-m-d-h-i-s').'-image1.jpg';
            $request->file('productimages1')->move(public_path().'/store/products/', $filename);
            $product->img = asset('/store/products/'.$filename);
            $product->save();
        }

        for($i=1; $i<=4; $i++){
            $images = new Images;
            if($request->hasFile('productimages'.$i)){
            $filename = $product->code.'-'.date('y-m-d-h-i-s')."-ima_ge$i.jpg";
            $request->file('productimages'.$i)->move(public_path().'/store/products/', $filename);

            $images->image = asset('/store/products/'.$filename);
            $images->product_id = $product->id;
            $images->store_id = $request->store_id;
            $images->save();
             }
        }

        return 'ok';



    }

    public function manage_products($view=null){


        if(!$view) $type='list';
        $store = Auth::user()->stores;
        if(!$store){
            return redirect()->to('/create_store')->with('message','create_your_store');
        }
        $store = $store->store;

        $categories = $store->categories;

        return view('store.products', compact('view', 'categories', 'store'));
    }

    public function manage_sales($view=null){

    }



}
