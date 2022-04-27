@extends('frontend.layouts.master')


@section('content')

    <form action="{{route('order.store')}}" method="POST">
        @csrf

        <div class="site__body">
            <div class="checkout block">
                <div class="container">
                    <div class="row">

                        <div class="col-12 col-lg-12 col-xl-12 mt-4 mt-lg-0">
                            <div class="card mb-0">
                                <div class="card-body"><h3 class="card-title">Your Order</h3>
                                    <table class="checkout__totals">
                                        <thead class="checkout__totals-header">
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody class="checkout__totals-products">
                                        @foreach($cartItems as $cartItem)
                                            <tr>
                                                <td> {{$cartItem->name}} × <a
                                                        class="btn btn-primary btn-sm text-white">{{$cartItem->quantity}}</a>
                                                </td>
                                                <td>$ {{$cartItem->price*$cartItem->quantity}}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tbody class="checkout__totals-subtotals">
                                        <tr>
                                            <th>Subtotal</th>
                                            <td>${{\Cart::getSubTotal('0')}}</td>
                                        </tr>
                                        <tr>
                                            <th>Store Credit</th>
                                            <td>$20.00</td>
                                        </tr>
                                        <tr>
                                            <th>Shipping</th>
                                            <td>$25.00x{{$cartItem->quantity}}</td>
                                        </tr>
                                        </tbody>
                                        <tfoot class="checkout__totals-footer">
                                        <tr>
                                            <th>Total</th>
                                            <td> ${{\Cart::getSubTotal('0')+$cartItem->quantity*25}} </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div class="payment-methods">
                                        <ul class="payment-methods__list">

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                       id="cash_on_delivery" value="cash_on_delivery">
                                                <label class="form-check-label" for="cash_on_delivery">
                                                    Cash On Delivery
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                       id="paypal1" value="paypal">
                                                <label class="form-check-label" for="paypal1">
                                                    Paypal
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                       id="stripe2" value="stripe">
                                                <label class="form-check-label" for="stripe2">
                                                    Stripe
                                                </label>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="payment_method"
                                                       id="wish1" value="wish">
                                                <label class="form-check-label" for="wish1">
                                                    Wish
                                                </label>
                                            </div>

                                        </ul>
                                    </div>
                                    <div class="checkout__agree form-group">
                                        <div class="form-check">
                                    <span class="form-check-input input-check">
                                        <span class="input-check__body">
                                            <input class="input-check__input" type="checkbox" id="checkout-terms"
                                                   checked value="1">
                                            <span class="input-check__box">

                                            </span>
                                            <svg class="input-check__icon" width="9px" height="7px">
                                                <use xlink:href="{{asset('frontend')}}/images/sprite.svg#check-9x7">

                                                </use>
                                            </svg>
                                        </span>
                                    </span>
                                            <label class="form-check-label" for="checkout-terms">I have read and agree
                                                to the
                                                website <a target="_blank" href="">terms and
                                                    conditions</a>*
                                            </label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="pay_amount"
                                           value="{{\Cart::getSubTotal('0')+$cartItem->quantity*25}}">
                                    <button type="submit" class="btn btn-primary btn-xl btn-block">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
