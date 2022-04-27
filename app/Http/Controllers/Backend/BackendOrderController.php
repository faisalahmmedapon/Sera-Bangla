<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\ProductShippingAddress;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Hash;
use Session;
class BackendOrderController extends Controller
{
    public function index(){
//        $orders = Order::orderBy('id','DESC')->get();
        $orders = DB::table('orders')
            ->join('users','users.id','orders.user_id')
            ->select('orders.*','users.name')
            ->orderBy('id','DESC')
            ->get();
//        return $orders;
        return view('backend.order.order',compact('orders'));
    }

    public function pendingOrder(){

        $orders = DB::table('orders')
            ->join('users','users.id','orders.user_id')
            ->select('orders.*','users.name')
            ->where('orders.status','pending')
            ->get();

        return view('backend.order.pending',compact('orders'));
    }
    public function reviewOrder(){

        $orders = DB::table('orders')
            ->join('users','users.id','orders.user_id')
            ->select('orders.*','users.name')
            ->where('orders.status','Order Review')
            ->get();

        return view('backend.order.review',compact('orders'));
    }

    public function acceptOrder(){

        $orders = DB::table('orders')
            ->join('users','users.id','orders.user_id')
            ->select('orders.*','users.name')
            ->where('orders.status','Accept')
            ->get();
        return view('backend.order.accept',compact('orders'));
    }

    public function confirmOrder(){

        $orders = DB::table('orders')
            ->join('users','users.id','orders.user_id')
            ->select('orders.*','users.name')
            ->where('orders.status','Confirm')
            ->get();

        return view('backend.order.confirm',compact('orders'));
    }


    public function canceledOrder(){

        $orders = DB::table('orders')
            ->join('users','users.id','orders.user_id')
            ->select('orders.*','users.name')
            ->where('orders.status','Canceled')
            ->get();

        return view('backend.order.canceled',compact('orders'));
    }
    public function processingOrder(){

        $orders = DB::table('orders')
            ->join('users','users.id','orders.user_id')
            ->select('orders.*','users.name')
            ->where('orders.status','Processing')
            ->get();

        return view('backend.order.processing',compact('orders'));
    }

    public function completedOrder(){

        $orders = DB::table('orders')
            ->join('users','users.id','orders.user_id')
            ->select('orders.*','users.name')
            ->where('orders.status','Completed')
            ->get();

        return view('backend.order.completed',compact('orders'));
    }


    public function details($id){

        $data['order'] = Order::where('id',$id)->first();
        $data['product'] = Product::where('id',$data['order']->product_id)->first();
        $data['product_shipping_address'] = ProductShippingAddress::where('id',$data['order']->product_shipping_address_id)->first();
        $data['user'] = User::where('id',$data['order']->user_id)->first();
        $data['status'] = OrderStatus::where('order_id',$data['order']->id)->get();
//return  $data['status'];

        $data['product_materials'] = DB::table('product_materials')
            ->where('product_id',$data['product']->id)
            ->join('materials','materials.id','product_materials.product_material_id')
            ->select('materials.*')
            ->get();


        $data['product_colors'] = DB::table('product_colors')
            ->where('product_id',$data['product']->id)
            ->join('colors','colors.id','product_colors.product_color_id')
            ->select('colors.*')
            ->get();


//        $data['product_category'] = ProductCategory::where('product_id',$id)->get();

        $data['product_category'] = DB::table('product_categories')
            ->where('product_id',$data['product']->id)
            ->join('categories','categories.id','product_categories.product_category_id')
            ->select('categories.*')
            ->first();

        $data['product_brand'] = Brand::where('id',$data['product']->product_brand_id)->first();
        $data['product_images'] =  json_decode( $data['product']->product_image);

        return view('backend.order.details',$data);

    }


    public function orderStatusChange(Request $request){

        $order_status = new OrderStatus();
        $order_status->order_id = $request->order_id;
        $order_status->user_id = $request->user_id;
        $order_status->order_status = $request->order_status;
        $order_status->payment_method = $request->payment_method;
        $order_status->amount = $request->amount;
        $order_status->payment_status = $request->payment_status;
        $order_status->save();
        if ($order_status->save()){
            $order = Order::findOrFail($request->order_id);
            $order->status = $request->order_status;;
            $order->save();
        }
        return redirect()->back();

    }
}
