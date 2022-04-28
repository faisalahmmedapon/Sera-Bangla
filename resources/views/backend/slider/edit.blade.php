@extends('backend.layouts.master')


@section('title')
    | Slider Edit
@endsection

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('slider.index')}}" class="btn btn-info"> <i class="fa fa-list"> Slider Lists </i>  </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row  py-5">
                <div class="col-12 col-sm-6 col-md-8 mx-auto">
                    <div class="shadow p-3">
                        <form action="{{route('slider.update',$slider->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="title"> Title: </label>
                                <input type="text" name="title" class="form-control" value="{{$slider->title}}" id="title">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('title'))?($errors->first('title')):''}}</div>
                            </div>
                            <div class="form-group">
                                <label for="image"> Slider Image: </label>
                                <input type="file" name="image" class="form-control" id="image">
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
