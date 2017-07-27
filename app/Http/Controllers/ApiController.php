<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Category;
class ApiController extends Controller
{
    //
    function get_City() {
    	// $cities = City::paginate(20);
    	// $cities = City::all();
    	// return json_decode($cities);
    	$cities = City::paginate(5);
    	return json_encode(response(array(
    	        'error' => false,
    	        'cities' =>$cities->toArray(),
    	       ),200));       
    }

    function get_Category() {

    	$categories = Category::paginate(20);
    	return response(array(
    						'errors'=> false,
    						'cities'=>$categories->toArray(),
    						200));
    }
}
