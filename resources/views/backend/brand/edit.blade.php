@extends('backend.layouts.master')


@section('title')
     | Brand edit
@endsection

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('category.index')}}" class="btn btn-info"> <i class="fa fa-list"> Category Lists </i>  </a>
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
                        <form action="{{route('brand.update',$brand->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand_name"> Brand Name: </label>
                                <input type="text" name="brand_name" class="form-control" value="{{$brand->brand_name}}" id="brand_name">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('brand_name'))?($errors->first('brand_name')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="brand_logo"> Brand Logo: </label>
                                <input type="file" name="brand_logo" class="form-control" id="brand_logo">
                            </div>

                            <div class="form-group">
                                <label for="coupon_id"> Coupon List </label>
                                <select class="form-control" name="coupon_id">
                                    @foreach($coupons as $coupon)
                                        <option @if ($coupon->id == $brand->coupon_id ) selected @endif  value="{{$coupon->id}}"> {{$coupon->coupon_name}} </option>
                                    @endforeach
                                </select>
{{--                                <input type="text" name="coupon_id" class="form-control" id="coupon_id">--}}
                            </div>
                            <button type="submit" class="btn btn-success"> Submit </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
