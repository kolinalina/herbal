<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function logout(){
        // Session::put('admin_nama',null);
        // Session::put('admin_id', null);
        Session::flush();
        return Redirect::to('/adminHerbs');
    }
}
