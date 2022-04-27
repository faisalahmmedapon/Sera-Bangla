<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use App\Models\ProductShippingAddress;
use Illuminate\Http\Request;
use Session;
class CartOrderController extends Controller
{
    public function order(Request $request)
    {

        $user_id = Session::get('user_id');

//
//
//                if ($order_product->save()) {

        if ($request->payment_method == 'cash_on_delivery') {


            $amount = $request->pay_amount;
            return view('frontend.payment.cash_on_delivery', compact('amount'));



//            return $request->all();
//            $order_product_status = new OrderStatus();
//            $order_product_status->order_id = $order_product->id;
//            $order_product_status->user_id = $order_product->user_id;
//            $order_product_status->order_status = 'pending';
//            $order_product_status->save();

            return 'pay with cash_on_delivery';
        } elseif ($request->payment_method == 'paypal') {

            $order_product_status = new OrderStatus();
            $order_product_status->order_id = $order_product->id;
            $order_product_status->user_id = $order_product->user_id;
            $order_product_status->order_status = 'pending';
            $order_product_status->save();

            return 'pay with paypal';
        } elseif ($request->payment_method == 'stripe') {
            $amount = $request->pay_amount;
            return view('frontend.payment.stripe', compact('amount'));
        } elseif ($request->payment_method == 'wish') {

            $order_product_status = new OrderStatus();
            $order_product_status->order_id = $order_product->id;
            $order_product_status->user_id = $order_product->user_id;
            $order_product_status->order_status = 'pending';
            $order_product_status->save();

            return 'pay with wish';
        } else {
            return 'please select one payment method';
        }
//
//                }

        $notification = array(
            'message' => 'Your order Submit successfully',
            'alert-type' => 'success'
        );


//        }

        return redirect('/')->with($notification);
    }


    public function checkout()
    {
        $data['cartItems'] = \Cart::getContent();
        $user_id = Session::get('user_id');

        $data['user_product_shipping_address'] = ProductShippingAddress::where('user_id', $user_id)->first();
        return view('frontend.order.checkout', $data);
    }


    public function userPaymentMethodStripe(Request $request)
    {


//        return $request->all();
        $server = json_decode(file_get_contents("https://geolocation-db.com/json/"));
        \Stripe\Stripe::setApiKey('sk_test_51IRtnOCYitchOLcaejRaLPEJ8VkMp3SoVsY0lFyEHXEII8fvjd3Zb7zeBNTK1xC54TqU7zz35XqytrKUlPNfVkz2005w7pmay9');

        $token = $_POST['stripeToken'];

        try {
            $charge = \Stripe\Charge::create([
                'amount' => $request->amount * 100,
                'currency' => 'usd',
                'description' => 'N/A',
                'source' => $token,
                'metadata' => ['order_id' => uniqid()],
            ]);

        } catch (\Stripe\Exception\CardException $e) {
            // Since it's a decline, \Stripe\Exception\CardException will be caught
            // echo 'Status is:' . $e->getHttpStatus() . '\n';
            // echo 'Type is:' . $e->getError()->type . '\n';
            // echo 'Code is:' . $e->getError()->code . '\n';
            // // param is '' in this case
            // echo 'Param is:' . $e->getError()->param . '\n';
            // echo 'Message is:' . $e->getError()->message . '\n';
            return redirect()->route('user.dashboard')->with('message', 'your card has insufficient funds.  try again!! ');
        } catch (\Stripe\Exception\RateLimitException $e) {
            // Too many requests made to the API too quickly
//            return redirect()->route('user.dashboard')->with('message', 'Something went wrong .  try again!! ');

        } catch (\Stripe\Exception\InvalidRequestException $e) {
            // Invalid parameters were supplied to Stripe's API
//            return redirect()->route('user.dashboard')->with('message', 'Something went wrong .  try again!! ');

        } catch (\Stripe\Exception\AuthenticationException $e) {
            // Authentication with Stripe's API failed
            // (maybe you changed API keys recently)
//            return redirect()->route('user.dashboard')->with('message', 'Something went wrong .  try again!! ');

        } catch (\Stripe\Exception\ApiConnectionException $e) {
            // Network communication with Stripe failed
//            return redirect()->route('user.dashboard')->with('message', 'Something went wrong .  try again!! ');

        } catch (\Stripe\Exception\ApiErrorException $e) {
            // Display a very generic error to the user, and maybe send
            // yourself an email
//            return redirect('/')->back()->with('message', 'Something went wrong .  try again!! ');

        } catch (Exception $e) {
            // Something else happened, completely unrelated to Stripe
//            return redirect()->route('user.dashboard')->with('message', 'Something went wrong .  try again!! ');

        }

        $user_id = Session::get('user_id');
        if ($request->address == 1) {
            $product_shipping_address = ProductShippingAddress::where('user_id', $user_id)->orderBy('id', "DESC")->first();
            $product_shipping_address->user_id = $user_id;
            $product_shipping_address->f_name = $request->f_name;
            $product_shipping_address->l_name = $request->l_name;
            $product_shipping_address->email = $request->email;
            $product_shipping_address->phone_number = $request->phone_number;
            $product_shipping_address->zella = $request->zella;
            $product_shipping_address->upozela = $request->upozella;
            $product_shipping_address->picup_point = $request->picup_point;
            $product_shipping_address->payment_method = "stripe";
            $product_shipping_address->save();
        } else {
            $product_shipping_address = new ProductShippingAddress();
            $product_shipping_address->user_id = $user_id;
            $product_shipping_address->f_name = $request->f_name;
            $product_shipping_address->l_name = $request->l_name;
            $product_shipping_address->email = $request->email;
            $product_shipping_address->phone_number = $request->phone_number;
            $product_shipping_address->zella = $request->zella;
            $product_shipping_address->upozela = $request->upozella;
            $product_shipping_address->picup_point = $request->picup_point;
            $product_shipping_address->payment_method = "stripe";
            $product_shipping_address->save();
        }


        if ($product_shipping_address->save()) {


            $cartItems = \Cart::getContent();
            foreach ($cartItems as $cartItem) {
                $order_product = new Order();
                $order_product->product_id = $cartItem->id;
                $order_product->user_id = $user_id;
                $order_product->product_shipping_address_id = $product_shipping_address->id;
                $order_product->product_price = $cartItem->price;
                $order_product->product_quantity = $cartItem->quantity;
                $order_product->product_total_price = $cartItem->price * $cartItem->quantity;
                $order_product->status = 'pending';
                $order_product->save();


                $order_product_status = new OrderStatus();
                $order_product_status->order_id = $order_product->id;
                $order_product_status->user_id = $user_id;
                $order_product_status->order_status = 'pending';
                $order_product_status->amount = $cartItem->price * $cartItem->quantity;
                $order_product_status->payment_method = 'stripe';
                $order_product_status->payment_status = 'success';
                $order_product_status->save();
            }
        }
        if ($order_product_status->save()) {
            \Cart::clear();

            $notification = array(
                'message' => 'Payment successfully!',
                'alert-type' => 'success'
            );
            return redirect('/')->with($notification);

        }
    }


    public function userPaymentMethodCashOnDelivery(Request $request)
    {


//        return $request->all();


        $user_id = Session::get('user_id');
        if ($request->address == 1) {
            $product_shipping_address = ProductShippingAddress::where('user_id', $user_id)->orderBy('id', "DESC")->first();
            $product_shipping_address->user_id = $user_id;
            $product_shipping_address->f_name = $request->f_name;
            $product_shipping_address->l_name = $request->l_name;
            $product_shipping_address->email = $request->email;
            $product_shipping_address->phone_number = $request->phone_number;
            $product_shipping_address->zella = $request->zella;
            $product_shipping_address->upozela = $request->upozella;
            $product_shipping_address->picup_point = $request->picup_point;
            $product_shipping_address->payment_method = "cash_on_delivery";
            $product_shipping_address->save();
        } else {
            $product_shipping_address = new ProductShippingAddress();
            $product_shipping_address->user_id = $user_id;
            $product_shipping_address->f_name = $request->f_name;
            $product_shipping_address->l_name = $request->l_name;
            $product_shipping_address->email = $request->email;
            $product_shipping_address->phone_number = $request->phone_number;
            $product_shipping_address->zella = $request->zella;
            $product_shipping_address->upozela = $request->upozella;
            $product_shipping_address->picup_point = $request->picup_point;
            $product_shipping_address->payment_method = "cash_on_delivery";
            $product_shipping_address->save();
        }


        if ($product_shipping_address->save()) {


            $cartItems = \Cart::getContent();
            foreach ($cartItems as $cartItem) {
                $order_product = new Order();
                $order_product->product_id = $cartItem->id;
                $order_product->user_id = $user_id;
                $order_product->product_shipping_address_id = $product_shipping_address->id;
                $order_product->product_price = $cartItem->price;
                $order_product->product_quantity = $cartItem->quantity;
                $order_product->product_total_price = $cartItem->price * $cartItem->quantity;
                $order_product->status = 'pending';
                $order_product->save();


                $order_product_status = new OrderStatus();
                $order_product_status->order_id = $order_product->id;
                $order_product_status->user_id = $user_id;
                $order_product_status->order_status = 'pending';
                $order_product_status->amount = $cartItem->price * $cartItem->quantity;
                $order_product_status->payment_method = 'cash_on_delivery';
                $order_product_status->payment_status = 'success';
                $order_product_status->save();
            }
        }
        if ($order_product_status->save()) {
            \Cart::clear();

            $notification = array(
                'message' => ' Thank you for your orders. Your order submit for Cash On Delivery!',
                'alert-type' => 'success'
            );
            return redirect('/')->with($notification);

        }
    }
}
