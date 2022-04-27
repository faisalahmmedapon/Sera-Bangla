<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;

class FrontendOrderController extends Controller
{
    public function authUserOrders(){
        $user_id  = Session::get('user_id');
        $orders = DB::table('orders')->where('user_id',$user_id)
            ->join('products','products.id','orders.product_id')
            ->orderBy('id',"DESC")
            ->select('orders.*','products.product_name')
            ->get();
//        return $orders;
        return view('frontend.order.order',compact('orders'));
    }
}
