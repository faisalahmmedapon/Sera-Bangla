<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Validator;
use Str;
class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        return view('backend.brand.index',compact('brands'));
    }

    public function create()
    {
        $coupons = Coupon::all();
        return view('backend.brand.create',compact('coupons'));
    }


    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'brand_name' => 'required|unique:brands'

        ]);


        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }else {

            $brand = new Brand();
            $brand->brand_name = $request->brand_name;
            $brand->brand_name_slug = Str::slug($request->brand_name);

            if ($request->file('brand_logo')) {
                $brand_logo = $request->file('brand_logo');
                $extension = $brand_logo->getClientOriginalExtension();
                $logo_name = "logo" . time() . "." . $extension;
                $brand_logo->move(public_path('/uploads/brand/'), $logo_name);
                $brand->brand_logo = "/uploads/brand/" . $logo_name;
            }

            $brand->coupon_id = $request->coupon_id;
            $brand->status = 1;
            $brand->save();

            $notification = array(
                'message' => 'The new brand publish successfully',
                'alert-type' => 'success'
            );

            return redirect('/brands')->with($notification);

        }


    }

    public function edit($id){
        $brand = Brand::findOrFail($id);
        $coupons = Coupon::all();
        return view('backend.brand.edit',compact('brand','coupons'));

    }

    public function update( Request $request,$id){

        $brand = Brand::findOrFail($id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_name_slug = Str::slug($request->brand_name);

        if ($request->file('brand_logo')) {
            $image_path = public_path($brand->brand_logo);
            if (file_exists($image_path)) {
                @unlink($image_path);
            }

            $brand_logo = $request->file('brand_logo');
            $extension = $brand_logo->getClientOriginalExtension();
            $logo_name = "logo" . time() . "." . $extension;
            $brand_logo->move(public_path('/uploads/brand/'), $logo_name);
            $brand->brand_logo = "/uploads/brand/" . $logo_name;
        }

        $brand->coupon_id = $request->coupon_id;
        $brand->status = 1;
        $brand->save();

        $notification = array(
            'message' => 'The brand update successfully',
            'alert-type' => 'success'
        );

        return redirect('/brands')->with($notification);

    }

    public function status($id){
        $brand = Brand::findOrFail($id);
        if ($brand->status == 1) {
            $brand->status = 0;
        } else {
            $brand->status = 1;
        }
        $brand->save();

        $notification = array(
            'message' => 'The brand status update successfully',
            'alert-type' => 'success'
        );

        return redirect('/brands')->with($notification);
    }
    public function delete($id){
        $brand = Brand::findOrFail($id);
        $image_path = public_path($brand->brand_logo);
        if (file_exists($image_path)) {
            @unlink($image_path);
        }

        $brand->delete();
        $notification = array(
            'message' => 'The brand delete successfully',
            'alert-type' => 'success'
        );

        return redirect('/brands')->with($notification);
    }
}
