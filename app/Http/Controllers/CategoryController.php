<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class CategoryController extends Controller
{
    //
    public function add(){
        return view('/admin.add_category');
    }

    public function editt($category_id){
        return view('/admin.edit_category');
    }

    public function all(){
        $this->AdminAutchCheck();
        $info = DB::table('category')->get();
        $manage = view('/admin.all_category')
            ->with('info',$info);
        return view('admin_page')
            ->with('admin.all_category', $manage);
        
    }

    public function AdminAutchCheck(){
        $admin_id=Session::get('admin_id');
        if($admin_id){
            return;
        }else{
            return Redirect::to('/adminHerbs')->send();
        }
    }

    public function save(Request $request){
        $data=array();
        $data['category_id']=$request->category_id;
        $data['category_add']=$request->category_add;
        $data['category_deskripsi']=$request->category_deskripsi;
        $data['category_status']=$request->status;

        DB::table('category')->insert($data);
        Session::put('message','Data Inserted');
        return Redirect::to('/add-category');
        
    }

    public function status_aktif($category_id){
        DB::table('category')
        ->where('category_id',$category_id)
        ->update(['category_status' => 1]);

        Session::put('message','Successfully to Active');
        return Redirect::to('/all-category');

    }

    public function status_nonaktif($category_id){
        DB::table('category')
        ->where('category_id',$category_id)
        ->update(['category_status' => 0]);

        Session::put('message','Successfully to Unactive');
        return Redirect::to('/all-category');

    }

    public function edit($category_id){
        $info=DB::table('category')
        ->where('category_id',$category_id)
        ->first();

        $info=view('/admin.edit_category')
        ->with('info',$info);
        return view('/admin_page')
        ->with('/admin.edit_category',$info);
       return view ('/admin_page');
    }

    public function update(Request $request, $category_id){
        // echo $category_id;
        $data=array();
        $data['category_add']=$request->category_add;
        $data['category_deskripsi']=$request->category_deskripsi;

        DB::table('category')
        -> where('category_id', $category_id)
        -> update($data);

        Session::get('message','Data Updated');
        return redirect::to('/all-category');
    }

    public function delete($category_id){
        DB::table('category')
        -> where('category_id', $category_id)
        -> delete();

        Session::get('message','Data Deleted');
        return redirect::to('/all-category');

    }



}
