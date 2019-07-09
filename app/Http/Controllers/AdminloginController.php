<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();

class AdminloginController extends Controller
{
        public function index(){
            // $this->AdminAutchCheck();
            return view ('admin_login');
        }

        public function AdminAutchCheck(){
            $admin_id=Session::get('admin_id');
            if($admin_id){
                return;
            }else{
                return Redirect::to('/adminHerbs')->send();
            }
        }

    public function dashboard(){
        $this->AdminAutchCheck();
        return view('admin.admin_dashboard');
        
    }

    public function dashboard2(Request $request){
        $admin_email=$request->admin_email;
        $admin_pass=md5($request->admin_pass);
        $result=DB::table('admin')
            ->where('admin_email',$admin_email)
            ->where('admin_pass',$admin_pass)
            ->first();

            if($result){
                Session::put('admin_nama',$result->admin_nama);
                Session::put('admin_id',$result->admin_id);
                return Redirect::to('/admindashboard');

            }else{
                Session::put('message','Email or Password Invalid');
                return Redirect::to('/adminHerbs');
            }

    }
}
