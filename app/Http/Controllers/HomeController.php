<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        
        $all_product_info = DB::table('product')
        ->join('category','product.category_id','=','category.category_id')
        ->where('product.product_status', 1)
        ->limit(5)
        ->get();
    $manage = view('/page.home_content')
        ->with('all_product_info',$all_product_info);
    return view('master')
        ->with('page.home_content', $manage);
    }


    public function gmaps()
    {
    	$locations = DB::table('lokasi')->get();
    	return view('gmaps',compact('locations'));
    }

    

    public function contac(){
        return view('page.contac_content');
    }

    public function help(){
        return view('page.help_content');
    }

    public function login(){
        return view('page.login_content');
    }
}
