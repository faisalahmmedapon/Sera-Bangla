@extends('backend.layouts.master')


@section('title')
     | Coupon Create
@endsection

@section('content')

    <!-- /.content-header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('coupon.index')}}" class="btn btn-info"> <i class="fa fa-list"> Coupon Lists </i>  </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row  py-5">
                <div class="col-12 col-sm-6 col-md-8 mx-auto">
                    <div class="shadow p-3">
                        <form action="{{route('coupon.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="coupon_name"> Coupon Name: </label>
                                <input type="text" name="coupon_name" class="form-control" value="{{old('coupon_name')}}" id="coupon_name">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('coupon_name'))?($errors->first('coupon_name')):''}}</div>
                            </div>

                            <div class="form-group">
                                <label for="coupon_price"> Coupon Value : </label>
                                <input type="text" name="coupon_price" class="form-control" value="{{old('coupon_price')}}" id="coupon_price">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('coupon_price'))?($errors->first('coupon_price')):''}}</div>
                            </div>

                            <button type="submit" class="btn btn-success"> <i class="fa ">Submit</i> </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
