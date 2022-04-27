@extends('backend.layouts.master')


@section('title')
    | Materials
@endsection

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-end">
                    <a href="{{route('material.create')}}" class="btn btn-success"> <i class="fa fa-plus"> New Category </i> </a>
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
                            <th scope="col"> Materials  Name</th>
                            <th scope="col"> Action </th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($materials as $key=>$material)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td>{{$material->material_name}}</td>
                            <td>
                                @if($material->status == 1)
                                    <a href="{{route('material.status',$material->id)}}" class="btn"> <i class="fa fa-thumbs-up"> </i> </a>
                                @else
                                    <a href="{{route('material.status',$material->id)}}" class="btn"> <i class="fa fa-thumbs-down"> </i> </a>
                                @endif
                                    <a href="{{route('material.edit',$material->id)}}" class="btn"> <i class="fa fa-edit"> </i> </a>
                                <a href="{{route('material.delete',$material->id)}}" class="btn"> <i class="fa fa-trash"> </i> </a>
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
