@extends('backend.layouts.master')


@section('title')
    | Colors
@endsection

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('color.create')}}" class="btn btn-success"> <i class="fa fa-plus"> New Color </i> </a>
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
                            <th scope="col"> Color Name</th>
                            <th scope="col"> Action </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($colors as $key=>$color)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$color->color_name}}</td>
                            <td>
                                @if($color->status == 1)
                                    <a href="{{route('color.status',$color->id)}}" class="btn"> <i class="fa fa-thumbs-up"> </i> </a>
                                @else
                                    <a href="{{route('color.status',$color->id)}}" class="btn"> <i class="fa fa-thumbs-down"> </i> </a>
                                @endif
                                    <a href="{{route('color.edit',$color->id)}}" class="btn"> <i class="fa fa-edit"> </i> </a>
                                <a href="{{route('color.delete',$color->id)}}" class="btn"> <i class="fa fa-trash"> </i> </a>
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
