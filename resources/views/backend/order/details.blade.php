@extends('backend.layouts.master')


@section('title')
    | Products
@endsection

@section('content')

    <!-- /.content-header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('color.index')}}" class="btn btn-info"> <i class="fa fa-list"> All Orders </i> </a>
                    <a href="{{route('pending.order')}}" class="btn btn-info"> <i class="fa fa-list"> Pending
                            Orders </i> </a>
                    <a href="{{route('review.order')}}" class="btn btn-info"> <i class="fa fa-list"> Review Orders </i>
                    </a>
                    <a href="{{route('accept.order')}}" class="btn btn-info"> <i class="fa fa-list"> Accept Orders </i>
                    </a>
                    <a href="{{route('confirm.order')}}" class="btn btn-info"> <i class="fa fa-list"> Confirm
                            Orders </i> </a>
                    <a href="{{route('canceled.order')}}" class="btn btn-info"> <i class="fa fa-list"> Canceled
                            Orders </i> </a>
                    <a href="{{route('processing.order')}}" class="btn btn-info"> <i class="fa fa-list"> Processing
                            Orders </i> </a>
                    <a href="{{route('completed.order')}}" class="btn btn-info"> <i class="fa fa-list"> Completed
                            Orders </i> </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                    <table class="table table-bordered table-active dataTable">

                        <tbody>
                        <tr>
                            <th> Product Name</th>
                            <td width="80%"> {{$product->product_name}} </td>
                        </tr>


                        <tr>
                            <th> Product Quantity</th>
                            <td> {{$product->product_quantity}} </td>
                        </tr>

                        <tr>
                            <th> Product SKU</th>
                            <td> {{$product->product_sku}} </td>
                        </tr>

                        <tr>
                            <th> Product Selling Price</th>
                            <td> ${{$product->product_selling_price}} </td>
                        </tr>

                        <tr>
                            <th> Product Discount Type</th>
                            <td> {{$product->product_discount_type}} </td>
                        </tr>

                        <tr>
                            <th> Product Discount</th>
                            <td> ${{$product->product_discount}} </td>
                        </tr>


                        <tr>
                            <th> Product Discount Price</th>
                            <td> ${{$product->product_discount_price}} </td>
                        </tr>


                        <tr>
                            <th> Product Brand</th>
                            <td> {{$product_brand->brand_name}} </td>
                        </tr>

                        <tr>
                            <th> Product Short Description</th>
                            <td> {!! $product->product_short_description !!} </td>
                        </tr>

                        <tr>
                            <th> Product Description</th>
                            <td> {!! $product->product_description !!} </td>
                        </tr>


                        <tr>
                            <th> Product Specification</th>
                            <td> {!! $product->product_specification !!} </td>
                        </tr>

                        <tr>
                            <th> Product Color</th>
                            <td>
                                @foreach($product_colors as $product_color)
                                    <button class="btn btn-default">{{$product_color->color_name}}</button>
                                @endforeach

                            </td>
                        </tr>

                        <tr>
                            <th> Product Category</th>
                            <td>
                                <button class="btn btn-default"> {{$product_category->category_name}}</button>

                            </td>
                        </tr>

                        <tr>
                            <th> Product Materials</th>
                            <td>
                                @foreach($product_materials as $product_material)
                                    <button class="btn btn-default">{{$product_material->material_name}}</button>
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <th> Product Images</th>
                            <td>
                                @foreach ($product_images as $key=>$data)
                                    <img class="shadow p-2" width="350px" height="170px" src="{{asset($data)}}">
                                @endforeach
                            </td>

                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <div class="container-fluid py-3">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                    <h3> Order Details</h3>
                    <table class="table table-bordered">

                        <tbody>
                        <tr>
                            <th> Order Product Name</th>
                            <td style="width: 80%"> {{$product->product_name}} </td>
                        </tr>


                        <tr>
                            <th> Order Product Quantity</th>
                            <td> {{$order->product_quantity}} </td>
                        </tr>


                        <tr>
                            <th> Order Product Price</th>
                            <td> ${{$order->product_price}} </td>
                        </tr>


                        <tr>
                            <th> Order Product Total Price</th>
                            <td> ${{$order->product_total_price}} </td>
                        </tr>

                        <tr>
                            <th> Order Times</th>
                            <td> {{$order->created_at->diffForHumans()}} </td>
                        </tr>


                        <tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <div class="container-fluid py-3">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                    <h3> Order Shipping Address Details</h3>
                    <table class="table table-bordered">

                        <tbody>
                        <tr>
                            <th>Name</th>
                            <td style="width: 80%"> {{$product_shipping_address->f_name}} {{$product_shipping_address->l_name}}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td> {{$product_shipping_address->email}} </td>
                        </tr>

                        <tr>
                            <th> Phone Number</th>
                            <td> {{$product_shipping_address->phone_number}} </td>
                        </tr>

                        <tr>
                            <th>Zela</th>
                            <td> {{$product_shipping_address->zella}} </td>
                        </tr>

                        <tr>
                            <th>Upozela</th>
                            <td> {{$product_shipping_address->upozela}} </td>
                        </tr>


                        <tr>
                            <th>Pickup Point</th>
                            <td> {{$product_shipping_address->picup_point}} </td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>
                                <button class="btn-success">{{$product_shipping_address->payment_method}}</button>
                            </td>
                        </tr>

                        <tr>
                            <th> Address Save Times</th>
                            <td> {{$product_shipping_address->created_at->diffForHumans()}} </td>
                        </tr>


                        <tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <div class="container-fluid py-3">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                    <h3> Order Status</h3>
                    <table class="table table-bordered">

                        <tbody>
                        @foreach($status as $order_status)
                            <tr>
                                <th> Status</th>
                                <td> {{$order_status->order_status}} </td>
                                <td> {{$order_status->created_at->diffForHumans()}} </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right">
                        <form action="{{route('order.status.change')}}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" value="{{$order_status->order_id}}">
                            <input type="hidden" name="user_id" value="{{$order_status->user_id}}">
                            <input type="hidden" name="payment_method" value="{{$order_status->payment_method}}">
                            <input type="hidden" name="amount" value="{{$order_status->amount}}">
                            <input type="hidden" name="payment_status" value="{{$order_status->payment_status}}">
                            <select class="form-select" aria-label="Default select example" name="order_status">
                                <option @if($order_status == 'pending') selected @endif value="pending">Pending</option>
                                <option @if($order_status == 'Order Review') selected @endif value="Order Review">Order
                                    Review
                                </option>
                                <option @if($order_status == 'Accept') selected @endif value="Accept">Accept</option>
                                <option @if($order_status == 'Confirm') selected @endif value="Confirm">Confirm</option>
                                <option @if($order_status == 'Canceled') selected @endif value="Canceled">Canceled
                                </option>
                                <option @if($order_status == 'Processing') selected @endif value="Processing">
                                    Processing
                                </option>
                                <option @if($order_status == 'Completed') selected @endif value="Completed">Completed
                                </option>
                            </select>
                            <button type="submit">Change</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <div class="container-fluid py-3">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                    <h3> Order User Information</h3>
                    <table class="table table-bordered">

                        <tbody>
                        <tr>
                            <th> Name</th>
                            <td width="80%"> {{$user->name}} </td>
                        </tr>

                        <tr>
                            <td>Email:</td>
                            <td>{{$user->email}}
                                @if($user->email_verified_at != null)
                                    <p class=" bg-success text-white p-1"> Email Verified</p>
                                @else
                                    <p class=" bg-danger text-white p-1"> Email Not Verified</p>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <td>Phone:</td>
                            <td>{{$user->phone}}
                                @if($user->phone_verified_at != null)
                                    <p class=" bg-success text-white p-1"> Phone Verified</p>
                                @else
                                    <p class=" bg-danger text-white p-1"> Phone Not Verified</p>
                                @endif

                            </td>
                        </tr>

                        <tr>
                            <td>Gender:</td>
                            <td>{{$user->gender}}</td>
                        </tr>

                        <tr>
                            <td>Address:</td>
                            <td>{{$user->address}}</td>
                        </tr>


                        <tr>
                            <td>Image:</td>
                            <td><img height="100px" width="200px" src="{{$user->image}}"></td>
                        </tr>

                        <tr>
                            <td>Profile Status :</td>
                            <td>@if($user->status == '1') <a class=" bg-success text-white p-1">Active</a> @else
                                    <a class="bg-danger text-white p-1">Inactive</a>                         <p> Your
                                        account has been disabled . Please Contact in support team.</p>
                                @endif
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
    </section>
    <!-- /.content -->

@endsection
