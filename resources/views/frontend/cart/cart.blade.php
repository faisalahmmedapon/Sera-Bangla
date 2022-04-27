@extends('frontend.layouts.master')


@section('content')

    @if($cartItems->count() > 0)

        <div class="site__body">
            <div class="cart block">
                <div class="container">
                    <table class="cart__table cart-table">
                        <thead class="cart-table__head">
                        <tr class="cart-table__row">
                            <th class="cart-table__column cart-table__column--image">Image</th>
                            <th class="cart-table__column cart-table__column--product">Product</th>
                            <th class="cart-table__column cart-table__column--price">Price</th>
                            <th class="cart-table__column cart-table__column--quantity">Quantity</th>
                            <th class="cart-table__column cart-table__column--total">Total</th>
                            <th class="cart-table__column cart-table__column--remove"></th>
                        </tr>
                        </thead>
                        <tbody class="cart-table__body">


                        @if($cartItems)
                            @foreach($cartItems as $item)

                                <?php
                                $product = App\Models\Product::where('id', $item->id)->first();
                                $product_images = json_decode($product->product_image);
                                $product_images_one = $product_images[0];
                                //dd($product_images_one)
                                ?>

                                <tr class="cart-table__row">
                                    <td class="cart-table__column cart-table__column--image"><a href="#"><img
                                                src="{{asset($product_images_one)}}" alt=""></a></td>
                                    <td class="cart-table__column cart-table__column--product"><a href="#"
                                                                                                  class="cart-table__product-name">{{$item->name}}</a>
{{--                                        <ul class="cart-table__options">--}}
{{--                                            <li>Color: Yellow</li>--}}
{{--                                            <li>Material: Aluminium</li>--}}
{{--                                        </ul>--}}
                                    </td>
                                    <td class="cart-table__column cart-table__column--price" data-title="Price">
                                        Tk {{$item->price}} </td>
                                    <td class="cart-table__column cart-table__column--quantity" data-title="Quantity">
                                        <div class="input-number">

                                            {{--                                <input class="form-control input-number__input" type="number"--}}
                                            {{--                                                             min="1" value="{{$item->quantity}}">--}}
                                            {{--                                <div class="input-number__add"></div>--}}
                                            {{--                                <div class="input-number__sub"></div>--}}

                                            <form action="{{ route('cart.update') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $item->id}}">
                                                <div class="d-flex">
                                                    <input style="width: 50px" type="number" name="quantity"
                                                           value="{{ $item->quantity }}"
                                                           class="w-6 text-center bg-gray-300"/>
                                                    <button type="submit" class="btn btn-primary cart__update-button">
                                                        update
                                                    </button>
                                                </div>
                                            </form>

                                        </div>
                                    </td>
                                    <td class="cart-table__column cart-table__column--total" data-title="Total">
                                        Tk {{$item->price*$item->quantity}}</td>
                                    <td class="cart-table__column cart-table__column--remove">
                                        {{--                            <button type="button" class="btn btn-light btn-sm btn-svg-icon">--}}
                                        {{--                                <svg width="12px" height="12px">--}}
                                        {{--                                    <use xlink:href="{{asset('frontend')}}/images/sprite.svg#cross-12"></use>--}}
                                        {{--                                </svg>--}}
                                        {{--                            </button>--}}
                                        <form action="{{ route('cart.remove') }}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{ $item->id }}" name="id">
                                            <button class="btn btn-primary cart__update-button">x</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        @endif
                        </tbody>
                    </table>
                    <div class="cart__actions">
                        <form class="cart__coupon-form"><label for="input-coupon-code" class="sr-only">Password</label>
                            <input type="text" class="form-control" id="input-coupon-code" placeholder="Coupon Code">
                            <button type="submit" class="btn btn-primary">Apply Coupon</button>
                        </form>
                        <div class="cart__buttons"><a href="{{route('continue.shopping')}}"
                                                      class="btn btn-primary cart__update-button">Continue Shopping</a>

                        </div>
                    </div>
                    <div class="row justify-content-end pt-5">
                        <div class="col-12 col-md-7 col-lg-6 col-xl-5">
                            <div class="card">
                                <div class="card-body"><h3 class="card-title">Cart Totals</h3>
                                        <table class="cart__totals">
                                            <thead class="cart__totals-header">
                                            <tr>
                                                <th>Subtotal</th>
                                                <td>Tk {{\Cart::getSubTotal('0')}}</td>
                                            </tr>
                                            </thead>
                                            <tbody class="cart__totals-body">
                                            <tr>
                                                <th>Shipping</th>
                                                <td> Tk 25x{{ $item->quantity }} = Tk {{ $item->quantity*25 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tax</th>
                                                <td>Tk 0.00</td>
                                            </tr>
                                            </tbody>
                                            <tfoot class="cart__totals-footer">
                                            <tr>
                                                <th>Pay</th>
                                                <td>Tk {{\Cart::getSubTotal('0')+$item->quantity*25}}</td>
                                            </tr>
                                            </tfoot>
                                        </table>

                                    <a class="btn btn-primary btn-xl btn-block cart__checkout-button"
                                       href="{{route('order.checkout')}}">Proceed
                                        to checkout</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <p class="text-center p-4 bg-light"> Please Add some product in your cart</p>
    @endif
@endsection
