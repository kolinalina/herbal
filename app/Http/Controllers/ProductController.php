<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    //
    public function index(){
        return view ('admin.add_product');
    }

    public function AdminAutchCheck(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/adminHerbs')->send();
        }
    }

    public function all(){
        $this->AdminAutchCheck();
        $all_product_info = DB::table('product')
            ->join('category','product.category_id','=','category.category_id')
           
            ->get();
        $manage = view('/admin.all_product')
            ->with('all_product_info',$all_product_info);
        return view('admin_page')
            ->with('admin.all_category', $manage);
    }

    public function save(Request $request){
        $data=array();
            $data['product_name']=$request->product_name;
            $data['category_id']=$request->category_id;
            $data['product_description1']=$request->product_description1;
            $data['product_description2']=$request->product_description2;
            $data['product_price']=$request->product_price;
            $data['product_price2']=$request->product_price2;
            $image=$request->file('product_image');
            $data['product_status']=$request->product_status;
            
        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
                    DB::table('product')->insert($data);
                    Session::put('message','Success Insert Data');
                    return Redirect::to('/add-product');
                    
                   
                    
            }
        }
        
        $data['product_image']='';
            DB::table('product')->insert($data);
            Session::put('message','Success Insert Data Without Image');
            return Redirect::to('/add-product');
       
    }

    public function status_aktif($product_id){
        DB::table('product')
        ->where('product_id',$product_id)
        ->update(['product_status' => 1]);

        Session::put('message','Successfully to Active');
        return Redirect::to('/all-product');

    }

    public function status_nonaktif($product_id){
        DB::table('product')
        ->where('product_id',$product_id)
        ->update(['product_status' => 0]);

        Session::put('message','Successfully to Unactive');
        return Redirect::to('/all-product');

    }

    public function edit($product_id){
        $info=DB::table('product')
        ->where('product_id',$product_id)
        ->first();

        $info=view('/admin.edit_product')
        ->with('info',$info);
        return view('/admin_page')
        ->with('/admin.edit_product',$info);
       return view ('/admin_page');
    }

    public function update(Request $request, $product_id){
        // echo $category_id;
        $data=array();
        $data['product_name']=$request->product_name;
        $data['category_id']=$request->category_id;
        $data['product_description1']=$request->product_description1;
        $data['product_description2']=$request->product_description2;
        $data['product_price']=$request->product_price;
        $data['product_price2']=$request->product_price2;
        $image=$request->file('product_image');
        $data['product_status']=$request->product_status;

        if($image){
            $image_name=str_random(20);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='image/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if($success){
                $data['product_image']=$image_url;
                    DB::table('product')
                    -> where('product_id', $product_id)
                    -> update($data);
                    Session::put('message','Success Insert Data');
                    return Redirect::to('/all-product');
                    
                   
                    
            }
        }
        
        $data['product_image']='';
            DB::table('product')
            -> where('product_id', $product_id)
            -> update($data);
            Session::put('message','Success Insert Data Without Image');
            return Redirect::to('/all-product');

       
    }

    public function delete($product_id){
        DB::table('product')
        -> where('product_id', $product_id)
        -> delete();

        Session::get('message','Data Deleted');
        return redirect::to('/all-product');

    }




}
