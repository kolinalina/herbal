<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class CartController extends Controller
{
    public function add_cart(Request $request){
        $qty=$request->qty;
        $product_id=$request->product_id;
        $product_info=DB::table('product')
            ->where('product_id',$product_id)
            ->first();

        $data['qty']=$qty;
        $data['id']=$product_info->product_id;
        $data['name']=$product_info->product_name;
        $data['price']=$product_info->product_price2;
        $data['weight']=$product_info->product_price2;
        $data['options']['image']=$product_info->product_image;

        Cart::add($data);
        return Redirect::to('/show-cart');

    }

    public function show_cart(){
        $all_published_category=DB::table('category')
            ->where('category_status',1)
            ->get();

        $manage_publish_category=view('page.cart')
            ->with('all_published_category',$all_published_category);
        
        return view ('master')
            ->with('page.cart', $manage_publish_category);

    }

    public function delete_cart($rowId){
        Cart::update($rowId, 0);
        return Redirect::to('/show-cart');

    }


    public function update_cart(Request $request){

        $rowId=$request->rowId;
        $qty=$request->qty;
        

        Cart::update($rowId, $qty);
        return Redirect::to('/show-cart');

    }

    public function index(){
        return view('/page.cart');
    }
}
