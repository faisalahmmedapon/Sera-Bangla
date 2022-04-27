@extends('backend.layouts.master')


@section('title')
    | Products
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 col-md-12 col-lg-12 d-flex justify-content-between">
                    <a class=" btn shadow "> <i class="fa fa-list"> Product Details </i> </a>
                    <a href="{{route('product.create')}}" class="btn shadow"> <i class="fa fa-plus"> New Product </i>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
            <div class="row">
                <div class="col-12 col-sm-6 col-md-12">
                    <table class="table table-bordered table-active dataTable">

                        <tbody>
                        <tr>
                            <th> Product Name</th>
                            <td> {{$product->product_name}} </td>
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
                            <td> {{$product->product_selling_price}} </td>
                        </tr>

                        <tr>
                            <th> Product Discount Type</th>
                            <td> {{$product->product_discount_type}} </td>
                        </tr>

                        <tr>
                            <th> Product Discount</th>
                            <td> {{$product->product_discount}} </td>
                        </tr>


                        <tr>
                            <th> Product Discount Price</th>
                            <td> {{$product->product_discount_price}} </td>
                        </tr>


                        <tr>
                            <th> Product Discount Price</th>
                            <td> {{$product->product_discount_price}} </td>
                        </tr>

                        <tr>
                            <th> Product Discount Price</th>
                            <td> {{$product->product_discount_price}} </td>
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
                            <th> Product Color </th>
                            <td>
                                @foreach($product_colors as $product_color)
                                    <button class="btn btn-default">{{$product_color->color_name}}</button>
                                @endforeach

                            </td>
                        </tr>

                        <tr>
                            <th> Product Category </th>
                            <td>
                                <button class="btn btn-default"> {{$product_category->category_name}}</button>

                            </td>
                        </tr>

                        <tr>
                            <th> Product Materials </th>
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

        </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->

@endsection
