<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Validator;
use Str;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::all();
        return view('backend.coupon.index',compact('coupons'));
    }

    public function create()
    {
        return view('backend.coupon.create');
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'coupon_name' => 'required|unique:coupons',
            'coupon_price' => 'required'

        ]);


        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }else {

            $coupon = new Coupon();
            $coupon->coupon_name = $request->coupon_name;
            $coupon->coupon_price = $request->coupon_price;
            $coupon->coupon_name_slug = Str::slug($request->coupon_name);
            $coupon->status = 1;
            $coupon->save();

            $notification = array(
                'message' => 'The new coupon publish successfully',
                'alert-type' => 'success'
            );

            return redirect('/coupons')->with($notification);

        }


    }

    public function edit($id){
        $coupon = Coupon::findOrFail($id);
        return view('backend.coupon.edit',compact('coupon'));

    }

    public function update( Request $request,$id){

        $coupon = Coupon::findOrFail($id);
        $coupon->coupon_name = $request->coupon_name;
        $coupon->coupon_name_slug = Str::slug($request->coupon_name);
        $coupon->coupon_price = $request->coupon_price;
        $coupon->save();

        $notification = array(
            'message' => 'The coupon update successfully',
            'alert-type' => 'success'
        );

        return redirect('/coupons')->with($notification);

    }

    public function status($id){
        $coupon = Coupon::findOrFail($id);
        if ($coupon->status == 1) {
            $coupon->status = 0;
        } else {
            $coupon->status = 1;
        }
        $coupon->save();

        $notification = array(
            'message' => 'The coupon status update successfully',
            'alert-type' => 'success'
        );

        return redirect('/coupons')->with($notification);
    }
    public function delete($id){
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();
        $notification = array(
            'message' => 'The coupon delete successfully',
            'alert-type' => 'success'
        );

        return redirect('/coupons')->with($notification);
    }
}
