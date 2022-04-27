<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        $notification = array(
            'message' => 'Successfully remove cart product done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);

    }

    public function cartList()
    {
        $cartItems = \Cart::getContent();
//        if ($cartItems->count() > 0) {

        return view('frontend.cart.cart', compact('cartItems'));
//        } else {
//            $notification = array(
//                'message' => 'please add some product in your cart then try to access',
//                'alert-type' => 'error'
//            );
//            return redirect()->back()->with($notification);
//        }
    }


    public function addToCart(Request $request)
    {


        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => $request->image,
        ]);

        $notification = array(
            'message' => ' successfully add to cart done',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );
        $notification = array(
            'message' => 'Update Cart successfully Done',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }


    public function clearAllCart()
    {
        \Cart::clear();

        $notification = array(
            'message' => 'Your Cart clear successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('cart.list')->with($notification);
    }


    public function continueShopping(){
        return redirect('/');
    }
}
