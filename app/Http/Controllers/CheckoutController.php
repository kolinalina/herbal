<?php

namespace App\Http\Controllers;

use DB;
use App\Http\Requests;
use Session;
use Cart;
use App\KecModel;
use App\KelModel;
use Illuminate\support\Facades\Redirect;
use Illuminate\Http\Request;


class CheckoutController extends Controller
{
    //
    public function login_check(){
        return view('page.login');
    }

    public function checkoutt(){
        return view('page.checkout');
    }

    public function kec(){
        $kec = KecModel::all();
    return view('page.checkout')->with('kec', $kec);
           
    }

    public function kel(){
        $kec_idd= Input::get('kec_idd');

        $kel = KelModel::where('kec_id', '=', $kec_idd)->get();
        return Response::json($kel);
    }

    public function registrasi_customer(Request $request){
        $data=array();
        $data['customer_username']=$request->customer_username;
        $data['customer_email']=$request->customer_email;
        $data['customer_pass']=md5($request->customer_pass);

        $customer_id=DB::table('customer')
           
            ->insertGetId($data);

        Session::put('customer_id',$customer_id);
        Session::put('customer_name',$request->customer_username);
        return Redirect::to('/index');


    }


    public function save_checkout(Request $request){
        $data=array();
        $data['ship_fullname']=$request->ship_fullname;
        $data['ship_address']=$request->ship_address;
        $data['ship_kodepos']=$request->ship_kodepos;
        $data['ship_email']=$request->ship_email;
        $data['ship_phone']=$request->ship_phone;
        $data['ship_note']=$request->ship_note;

    //    echo "<pre>";
    //    print_r($data);
    //    echo "</pre>";

    $ship_id=DB::table('ship')
            ->insertGetId($data);

        Session::put('ship_id', $ship_id);
        
        return Redirect::to('/customer-payment');


    }


    public function customer_login(Request $request){
      $customer_email = $request->customer_email;
      $customer_pass = md5($request->customer_pass);
      $result=DB::table('customer')
        ->where('customer_email', $customer_email)
        ->where('customer_pass',$customer_pass)
        ->first();

        if($result){
            Session::put('customer_id',$result->customer_id);
            Session::put('customer_username',$result->customer_username);
            return Redirect::to('/checkout');
        }else{
            Session::put('message','Email or Password Invalid');
            return Redirect::to('/login-check');
        }
    }

    public function customer_payment(){
        return view('page.payment');
    }


    public function place_order(Request $request){
        $payment_method=$request->payment_method;

        $pdata=array();
        $pdata['payment_method']=$payment_method;
        $pdata['payment_status']='0';
       $payment_id=DB::table('payment')
        ->insertGetId($pdata);


        $odata=array();
        $odata['customer_id']=Session::get('customer_id');
        $odata['ship_id']=Session::get('ship_id');
        $odata['payment_id']=$payment_id;
        $odata['order_total']=Cart::total();
        $odata['order_status']='0';
        $order_id=DB::table('order')
              ->insertGetId($odata);

        $contents=Cart::content();
        $oddata=array();


              foreach($contents as $v_contents)
              {
                $oddata['order_id']=$order_id;
                $oddata['product_id']=$v_contents->id;
                $oddata['product_name']=$v_contents->name;
                $oddata['product_price']=$v_contents->price;
                $oddata['product_qty']=$v_contents->qty;

                DB::table('order_detail')
                ->insert($oddata);
              }

              if($payment_method=='bank'){
                Cart::destroy();
                Session::put('message','Transfer melalui Teller Bank');
                 return Redirect::to('/direct');
              }elseif($payment_method=='atm'){
                Cart::destroy();
               Session::put('message','Transfer melalui ATM');
                return Redirect::to('/direct');
              }else{
                echo "not selected";
              }


        
    }
    public function direct(){
        return view('page.direct');
    }


    public function transaksi() {
    $all_order_info = DB::table('order') 
    -> join(
        'customer',
        'order.customer_id',
        '=',
        'customer.customer_id'
    )
     -> select('order.*','customer.customer_username')
     -> get();
    $manage = view('/admin.transaksi') 
    -> with (
        'all_order_info',
        $all_order_info
    ) 
    ;
    return view('admin_page') 
    -> with ('admin.transaksi', $manage) ;
    }


    public function view_order($order_id){
        // return view('admin.view_order');
        $order=DB::table('order')
        -> join('customer','order.customer_id','=','customer.customer_id')
        -> join('order_detail','order.order_id','=','order_detail.order_id')
        -> join('ship','order.ship_id','=','ship.ship_id')
        -> select('order.*','customer.*','order_detail.*','ship.*')
       
        -> get();

        // echo "<pre>";
        // print_r($order);
        // echo "</pre>";

        $manage = view('/admin.view_order') 
    -> with (
        'order',
        $order
    ) 
    ;
    return view('admin_page') 
    -> with ('admin.view_order', $manage) ;
    }


    public function status_success($order_id){
        DB::table('order')
        ->where('order_id',$order_id)
        ->update(['order_status' => 1]);

        Session::put('message','Successfully to Active');
        return Redirect::to('/transaksi');

    }

    public function status_nonaktif($order_id){
        DB::table('order')
        ->where('order_id',$product_id)
        ->update(['order_status' => 0]);

        Session::put('message','Successfully to Unactive');
        return Redirect::to('/transaksi');

    }



public function customer_logout() {
    // Session::put('admin_nama',null); Session::put('admin_id', null);
    Session::flush();
    return Redirect::to('/');
}

    }


