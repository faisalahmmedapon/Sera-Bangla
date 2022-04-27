@extends('frontend.layouts.master')


@section('content')
    <style>
        /*sbuscribe area styles*/
        .subscribe-box {
            max-width: 1024px;
            padding: 20px 0;
            margin: 0 auto;
            width: 100%;
            background-color: #fff;
            box-shadow: 0px 0px 4px 0px #909090;
        }

        .subs-body {
            max-width: 645px;
            margin: 0 auto;
            width: 100%;
        }

        .subs-step p {
            text-align: center;
            font-size: 18px;
            font-weight: 500;
        }

    </style>


        <style type="text/css">
            /**
             * The CSS shown here will not be introduced in the Quickstart guide, but shows
             * how you can use CSS to style your Element's container.
             */
            .StripeElement {
                box-sizing: border-box;
                height: 40px;
                width: 100%;
                padding: 10px 12px;
                border: 1px solid transparent;
                border-radius: 4px;
                background-color: white;
                box-shadow: 0 1px 3px 0 #e6ebf1;
                -webkit-transition: box-shadow 150ms ease;
                transition: box-shadow 150ms ease;
            }

            .StripeElement--focus {
                box-shadow: 0 1px 3px 0 #cfd7df;
            }

            .StripeElement--invalid {
                border-color: #fa755a;
            }

            .StripeElement--webkit-autofill {
                background-color: #fefde5 !important;
            }

        </style>


    <div class="subscribe-box my-5">

            <form action="{{route('user.payment.method.cash_on_delivery')}}" method="post" id="payment-form">
                @csrf

            <?php

                $user_id = Session::get('user_id');

                $user_product_shipping_address = \App\Models\ProductShippingAddress::where('user_id',$user_id)->first();

                ?>

                <div class="col-12 col-lg-12 col-xl-12">
                    <div class="card mb-lg-0">
                        <div class="card-body"><h3 class="card-title"> Shipping Details </h3>
                            @if($user_product_shipping_address)
                                <div class="form-row">
                                    <input type="hidden" value="1" name="address">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name</label>
                                        <input name="f_name" type="text" class="form-control" id="f_name"
                                               placeholder="First Name"
                                               value="{{$user_product_shipping_address->f_name}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="first_name">Last Name</label>
                                        <input name="l_name" type="text" class="form-control" id="l_name"
                                               placeholder="Last Name"
                                               value="{{$user_product_shipping_address->l_name}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="email"> Email </label>
                                        <input name="email" type="email" class="form-control" id="email"
                                               placeholder="email"
                                               value="{{$user_product_shipping_address->email}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="number">Phone Number </label>
                                        <input name="phone_number" type="text" class="form-control" id="number"
                                               placeholder="phone number"
                                               value="{{$user_product_shipping_address->phone_number}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="zella"> Zella </label>
                                        <input name="zella" type="text" class="form-control" id="zella"
                                               placeholder="zella"
                                               value="{{$user_product_shipping_address->zella}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="upozella"> UpoZella </label>
                                        <input name="upozella" type="text" class="form-control" id="upozella"
                                               placeholder="upozella"
                                               value="{{$user_product_shipping_address->upozela}}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="picup_point"> Picup Point </label>
                                        <input name="picup_point" type="text" class="form-control"
                                               id="picup_point"
                                               placeholder="picup_point"
                                               value="{{$user_product_shipping_address->picup_point}}">
                                    </div>
                                </div>
                            @else
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name">First Name</label>
                                        <input name="f_name" type="text" class="form-control" id="f_name"
                                               placeholder="First Name">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="first_name">Last Name</label>
                                        <input name="l_name" type="text" class="form-control" id="l_name"
                                               placeholder="Last Name">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="email"> Email </label>
                                        <input name="email" type="email" class="form-control" id="email"
                                               placeholder="email">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="number">Phone Number </label>
                                        <input name="phone_number" type="text" class="form-control" id="number"
                                               placeholder="phone number">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="zella"> Zella </label>
                                        <input name="zella" type="text" class="form-control" id="zella"
                                               placeholder="zella">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="upozella"> UpoZella </label>
                                        <input name="upozella" type="text" class="form-control" id="upozella"
                                               placeholder="upozella">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="picup_point"> Picup Point </label>
                                        <input name="picup_point" type="text" class="form-control"
                                               id="picup_point"
                                               placeholder="picup_point">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="subs-body mt-3">

                        <input type="hidden" name="amount" value="{{$amount}}">

                    <div class="text-center mt-5 mb-5">
                        <button class=" enroll text-white btn btn-success" type="submit" tabindex="0"> Place Order</button>
                    </div>
                </div>
            </form>


    </div>


@endsection
