<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\city_area as area;

class ScriptController extends Controller
{
    //

    public function get_areas(Request $request){
    	$areas = new area;
    	if($request->city_id) $areas = $areas->where(['city_id'=>$request->city_id]);
    	$areas = $areas->get();
    	$response ='';

    	foreach($areas as $area){
    		$response.="<option $area->id>$area->name</option>";
    	}

    	return $response;
    }

}
