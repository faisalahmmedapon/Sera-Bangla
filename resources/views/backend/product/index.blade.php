@extends('backend.layouts.master')


@section('title')
    | Products
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('product.create')}}" class="btn btn-success"> <i class="fa fa-plus"> New Product </i> </a>
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
                        <thead>
                        <tr>
                            <th> SL </th>
                            <th> Name</th>
                            <th> Quantity</th>
                            <th> SKU </th>
                            <th> Price </th>
                            <th> Action </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($products as $key=>$products)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$products->product_name}}</td>
                            <td>{{$products->product_quantity}}</td>
                            <td>{{$products->product_sku}}</td>
                            <td> ৳{{$products->product_discount_price}}</td>
                            <td>
                                <a href="{{route('product.details',$products->id)}}" class="btn"> <i class="fa fa-eye"> </i> </a>
                            @if($products->status == 1)
                                    <a href="{{route('product.status',$products->id)}}" class="btn"> <i class="fa fa-thumbs-up"> </i> </a>
                                @else
                                    <a href="{{route('product.status',$products->id)}}" class="btn"> <i class="fa fa-thumbs-down"> </i> </a>
                                @endif
                                    <a href="{{route('product.edit',$products->id)}}" class="btn"> <i class="fa fa-edit"> </i> </a>
                                <a href="{{route('product.delete',$products->id)}}" class="btn"> <i class="fa fa-trash"> </i> </a>
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
