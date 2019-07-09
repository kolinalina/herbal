<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class ProductFrontController extends Controller
{
    //
    public function product(){
     
            $all_product_info = DB::table('product')
            ->join('category','product.category_id','=','category.category_id')
            ->where('product.product_status', 1)
            
            ->get();
        $manage = view('/page.product_content')
            ->with('all_product_info',$all_product_info);
        return view('master')
            ->with('page.product_content', $manage);
        }

        public function viewcategory($category_id){
     
            $all_product_category = DB::table('product')
            ->join('category','product.category_id','=','category.category_id')
            ->select('product.*','category.category_add')
            ->where('category.category_id',$category_id)
            ->where('product.product_status', 1)
            ->get();
        $manage_viewcategory = view('page.product_category')
            ->with('all_product_category',$all_product_category);
        return view('master')
            ->with('page.product_category', $manage_viewcategory );
        }

        public function product_detail($product_id){
     
            $all_product_detail = DB::table('product')
            ->join('category','product.category_id','=','category.category_id')
            ->select('product.*','category.category_add')
            ->where('product.product_id',$product_id)
            ->where('product.product_status', 1)
            ->first();
        $manage_viewdetail = view('/page.product_detail')
            ->with('all_product_detail',$all_product_detail);
        return view('master')
            ->with('page.product_detail', $manage_viewdetail );
        }
    }
