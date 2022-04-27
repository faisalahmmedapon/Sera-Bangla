@extends('frontend.layouts.master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('frontend.partials.dashboard_siteber')
            </div>
            <div class="col-md-9">
               <table class="table table-bordered">
                   <thead>
                   <tr>
                       <td>Id</td>
                       <td>Product</td>
                       <td> Quantity</td>
                       <td> Price</td>
                       <td> Status </td>
                       <td>Action</td>
                   </tr>
                   </thead>
                   <tbody>
                   @foreach($orders as $key=>$order)
                   <tr>
                       <td> {{$key+1}} </td>
                       <td> {{Str::limit($order->product_name,100)}} </td>
                       <td> {{$order->product_quantity}} </td>
                       <td> Tk {{$order->product_total_price}} </td>
                       <td> {{$order->status}} </td>
{{--                       <td> {{Carbon\Carbon::createFromFormat('m/d/Y', $order->created_at)->diffForHumans()}}</td>--}}

                       <?php
                       $date = $order->created_at;

                       $date = Carbon\Carbon::parse($date); // now date is a carbon instance
//                       $elapsed = $date->diffForHumans(Carbon\Carbon::now());
                       $elapsed = $date->diffForHumans();
                       ?>
                       <td> {{ $elapsed }}</td>
                   </tr>
                   @endforeach
                   </tbody>
               </table>
            </div>
        </div>
    </div>
@endsection
