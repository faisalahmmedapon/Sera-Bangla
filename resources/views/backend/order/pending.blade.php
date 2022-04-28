@extends('backend.layouts.master')


@section('title')
    | Pending Orders
@endsection

@section('content')
    <!-- /.content-header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('order.index')}}" class="btn btn-info"> <i class="fa fa-list"> All Orders </i>  </a>
                    <a href="{{route('pending.order')}}" class="btn btn-info"> <i class="fa fa-list"> Pending Orders </i>  </a>
                    <a href="{{route('review.order')}}" class="btn btn-info"> <i class="fa fa-list"> Review Orders </i>  </a>
                    <a href="{{route('accept.order')}}" class="btn btn-info"> <i class="fa fa-list"> Accept Orders </i>  </a>
                    <a href="{{route('confirm.order')}}" class="btn btn-info"> <i class="fa fa-list"> Confirm Orders </i>  </a>
                    <a href="{{route('canceled.order')}}" class="btn btn-info"> <i class="fa fa-list"> Canceled Orders </i>  </a>
                    <a href="{{route('processing.order')}}" class="btn btn-info"> <i class="fa fa-list"> Processing Orders </i>  </a>
                    <a href="{{route('completed.order')}}" class="btn btn-info"> <i class="fa fa-list"> Completed Orders </i>  </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                    <table class="table table-bordered table-active dataTable">
                        <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">  User Name </th>
                            <th scope="col">  Paid Price </th>
                            <th scope="col"> QTY </th>
                            <th scope="col"> Status </th>
                            <th scope="col"> Action </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($orders as $key=>$order)
                            <tr>
                                <th>{{$key+1}}</th>
                                <td>{{$order->name}}</td>
                                <td> ৳{{$order->product_total_price}}</td>
                                <td>{{$order->product_quantity}}</td>
                                <td>{{$order->status}}</td>
                                <td>
                                    <a href="{{route('order.details',$order->id)}}" class="btn"> <i class="fa fa-eye"> </i> </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            <!-- /.row -->

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
