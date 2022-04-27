@extends('backend.layouts.master')


@section('title')
    | Coupons
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('coupon.create')}}" class="btn btn-success"> <i class="fa fa-plus"> New Category </i> </a>
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
                            <th scope="col">SL</th>
                            <th scope="col"> Coupon Name</th>
                            <th scope="col"> Coupon Value</th>
                            <th scope="col"> Action </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($coupons as $key=>$coupon)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$coupon->coupon_name}}</td>
                            <td>{{$coupon->coupon_price}}%</td>
                            <td>
                                @if($coupon->status == 1)
                                    <a href="{{route('coupon.status',$coupon->id)}}" class="btn"> <i class="fa fa-thumbs-up"> </i> </a>
                                @else
                                    <a href="{{route('coupon.status',$coupon->id)}}" class="btn"> <i class="fa fa-thumbs-down"> </i> </a>
                                @endif
                                    <a href="{{route('coupon.edit',$coupon->id)}}" class="btn"> <i class="fa fa-edit"> </i> </a>
                                <a href="{{route('coupon.delete',$coupon->id)}}" class="btn"> <i class="fa fa-trash"> </i> </a>
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
