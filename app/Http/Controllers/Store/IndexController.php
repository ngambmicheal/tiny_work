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
use App\invoice;
use App\sale;
use App\User;
use App\employee_proposal as emp;
use App\employee;
use App\link_to_store;

class IndexController extends Controller
{
    //


    public function settings($view=null){
    	if(!$view) $type='store';
    	$store = Auth::user()->stores;

        if(!$store ){
            if(Auth::user()->privilege=='Owner') return redirect()->to('/create_store')->with('message','create_your_store');
            else return redirect()->to('/storelist')->with('message', "Apply for a store");
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

       
        if(!$store ){
            if(Auth::user()->privilege=='Owner') return redirect()->to('/create_store')->with('message','create_your_store');
            else return redirect()->to('/storelist')->with('message', "Apply for a store");
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
             $images = new Images;
            $images->image = asset('/store/products/'.$filename);
            $images->product_id = $product->id;
          //  $images->store_id = $request->store_id;
            $images->save();

        }

        for($i=2; $i<=4; $i++){
            $images = new Images;
            if($request->hasFile('productimages'.$i)){
            $filename = $product->code.'-'.date('y-m-d-h-i-s')."-ima_ge$i.jpg";
            $request->file('productimages'.$i)->move(public_path().'/store/products/', $filename);

            $images->image = asset('/store/products/'.$filename);
            $images->product_id = $product->id;
           // $images->store_id = $request->store_id;
            $images->save();
             }
        }

        return 'Product Added Successfully';

    }

    public function manage_products($view=null, Request $request){
       

        if(!$view) $type='list';
        $store = Auth::user()->stores;
        
        if(!$store ){
            if(Auth::user()->privilege=='Owner') return redirect()->to('/create_store')->with('message','create_your_store');
            else return redirect()->to('/storelist')->with('message', "Apply for a store");
        }

        $store = $store->store;

        $categories = $store->categories;

        if($view=='edit' && $request->productid){
            $product = product::find($request->productid);
        }

        return view('store.products', compact('view', 'categories', 'store', 'product'));
    }

    public function manage_sales($view=null, Request $request){
      



        if(!$view) $type='list';
        $store = Auth::user()->stores;
       
        if(!$store ){
            if(Auth::user()->privilege=='Owner') return redirect()->to('/create_store')->with('message','create_your_store');
            else return redirect()->to('/storelist')->with('message', "Apply for a store");
        }
        
        $store = $store->store;

        if($view=='edit' && $request->saleid){
            $sale = sale::find($request->saleid);
        }

        return view('store.sales', compact('view', 'categories', 'sales', 'store', 'sale'));
    }

    public function add_sale(Request $request){
        $sale = new sale;
        $sale->name = $request->name;
        $sale->status = 'Active';
        $sale->tagline = $request->tagline;
        $sale->sale_discount = $request->discount;
        $sale->till = $request->till;
        $sale->store_id = $request->store_id;
        $sale->save();
    }

    public function up_sale(Request $request){
        $sale = sale::find($request->saleid);
        $sale->name = $request->name;
        $sale->status = 'Active';
        $sale->tagline = $request->tagline;
        $sale->sale_discount = $request->discount;
        $sale->till = $request->till;
        $sale->save();

        return 'Ok';
    }

    public function add_product_to_sale(Request $request){
      

        foreach (json_decode($request->data) as $key => $value) {
              $inv = new invoice;
              $inv->sale_id = $request->saleid;
              $inv->store_id = sale::find($request->saleid)->store_id;
              $inv->product_id = $value;
              $inv->save();
        }
    }

    public function del_invoice(Request $request){

        $invoice = invoice::find($request->id);

        $invoice->delete();
    }

    public function cs(Request $request){
        $sale = sale::find($request->idin);

        if($sale->status=='Active') $sale->status='InActive';
        else $sale->status='Active';

        $sale->save();
    }

     public function get_request_details(Request $request){
        $emp = emp::find($request->id);
        $emp->user = $emp->user;
        return $emp;
    }

    public function reject_request(Request $request){
        $emp = emp::find($request->id);
        $emp->status = 'Rejected';
        $emp->reason = $request->message;
        $emp->save();

        $check = employee::where(['user_id'=>$emp->user_id,'store_id'=>$emp->store_id])->first();
        if($check) $check->delete();

        $check = link_to_store::where(['user_id'=>$emp->user_id,'store_id'=>$emp->store_id])->first();
        if($check) $check->delete();

        return 'Rejected';
    }

    public function approve_request(Request $request){
        $emp = emp::find($request->id);
        $emp->status ='Accepted';
        $emp->save();

         $check = employee::where(['user_id'=>$emp->user_id,'store_id'=>$emp->store_id])->first();
    if(!$check) {
        $employee = new employee; 
        $employee->user_id = $emp->user_id;
        $employee->store_id = $emp->store_id;
        $employee->status = 'Serving';
        $employee->employment_date = date('Y-m-d H:i:s');
        $employee->save();

    }

        $check = link_to_store::where(['user_id'=>$emp->user_id,'store_id'=>$emp->store_id])->first();
    if(!$check){
              $link_to_store = new link_to_store;
        $link_to_store->user_id = $emp->user_id;
        $link_to_store->store_id = $emp->store_id;
        $link_to_store->save();

    }


      
        return "Accepted";
    }



}
