@extends('backend.layouts.master')


@section('title')
     | Color Edit
@endsection

@section('content')
    <!-- /.content-header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('color.index')}}" class="btn btn-info"> <i class="fa fa-list"> Color Lists </i>  </a>
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
                        <form action="{{route('color.update',$color->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="color_name"> Color Name: </label>
                                <input type="text" name="color_name" class="form-control" value="{{$color->color_name}}" id="color_name">
                                <div style='color:red; padding: 0 5px;'>{{($errors->has('color_name'))?($errors->first('color_name')):''}}</div>
                            </div>

                            <button type="submit" class="btn btn-success">  Submit  </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
