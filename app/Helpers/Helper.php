<?php

namespace App\Helpers;

use App\category;
use App\store;
use App\city;

class Helper 
{
    //

    public static function get_categories(){
    	return category::all();  //get the list of all categories and return it as object
    }

    public static function get_cities(){
        return city::all();
    }

    function paragraph_modifier($para)
{
  	$para = str_replace('-.b-', '</strong>', str_replace('-b-', '<strong>',  $para));
    $para = str_replace('-.i-', '</i>', str_replace('-i-', '<i>', $para));
    $para = str_replace('-.u-', '</span>', str_replace('-u-', '<span style="text-decoration: underline;">', $para));
    $para = str_replace('-n-', '<br />', $para);

  	return $para;
}

function sale_price($discount, $price)
{
    $price = trim($price);
    $discount = trim($discount);
	$new_price = $price - (($price/100) * $discount);

	return number_format($new_price,2);
}

function discount_price($discount, $price)
{
    $price = trim($price);
    $discount = trim($discount);
	$new_price = $price - (($price/100) * $discount);

	return number_format($new_price,2);
}

public static function image_check($image)
{
	$no_image = "noimagefound.jpg";
    if(!empty($image) && file_exists('/uploads/store/products/'.$image) )
    {
        return '/uploads/store/products/'.$image;
    }
    return '/uploads/web_service/'.$no_image;
}

function script_image_check($image)
{
    $no_image = "noimagefound.jpg";
    if(!empty($image) && file_exists('../uploads/store/products/'.$image) )
    {
        return '../uploads/store/products/'.$image;
    }
    return '../uploads/web_service/'.$no_image;
}

function clear_string($string)
{
   return trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9 ]/', ' ', urldecode(html_entity_decode(strip_tags($string))))));
}

function show_alert($alert)
{
    if($alert==1)
    {
        return "Invalid Email/Password";
    }
    else if($alert==2)
    {
        return "Email already used.";
    }
    else if($alert==3)
    {
        return "Username is in use already";
    }
    else if($alert==104)
    {
        return "The email address you entered is not valid.";
    }
    else if($alert==105)
    {
        return "Invalid password configuration.";
    }

}

    public static function get_average($id, $type='store'){  //if type is not defined, then we use store as default

        if($type=='store') $p = store::find($id);
        if($type=='product') $p = product::find($id);

        $reviews = $p->reviews;
        $total = $reviews->sum('rev_star');

        if(!$reviews) return $avg =0;               //if no review, return 0;
        return $avg =  ceil($total/count($reviews));
    }

}
