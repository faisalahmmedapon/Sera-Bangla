@extends('frontend.layouts.master')


@section('content')


    <div class="container">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3> {{$category->category_name}} </h3>
                </div>
            </div>
            <div class="row">
                @foreach($category_products as $category_product)
                    <div class="col-md-4">


                        <?php
                        $product_images = json_decode($category_product->product_image);
                        $product_images_one = $product_images[0];
                        //dd($product_images_one)
                        ?>
                        <div class="product-card p-3">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use
                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--new">New</div>
                            </div>
                            <div class="product-card__image"><a href="{{route('frontend.product.details',$category_product->product_name_slug)}}"><img
                                        src="{{asset($product_images_one)}}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a
                                        href="{{route('frontend.product.details',$category_product->product_name_slug)}}"> {{Str::limit($category_product->product_name,70)}}</a>
                                </div>
                                <div class="product-card__rating">
                                    <div class="rating">
                                        <div class="rating__body">
                                            <svg class="rating__star rating__star--active" width="13px"
                                                 height="12px">
                                                <g class="rating__fill">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images//sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div
                                                class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px"
                                                 height="12px">
                                                <g class="rating__fill">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div
                                                class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px"
                                                 height="12px">
                                                <g class="rating__fill">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div
                                                class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star rating__star--active" width="13px"
                                                 height="12px">
                                                <g class="rating__fill">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div
                                                class="rating__star rating__star--only-edge rating__star--active">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                            <svg class="rating__star" width="13px" height="12px">
                                                <g class="rating__fill">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                                </g>
                                                <g class="rating__stroke">
                                                    <use
                                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                                </g>
                                            </svg>
                                            <div class="rating__star rating__star--only-edge">
                                                <div class="rating__fill">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                                <div class="rating__stroke">
                                                    <div class="fake-svg-icon"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-card__rating-legend">9 Reviews</div>
                                </div>

                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability">Availability: <span
                                        class="text-success">In Stock</span></div>
                                <div class="product-card__prices">
                                    ${{$category_product->product_discount_price}}
                                    @if($category_product->product_discount_type == 1)
                                        <del> ${{$category_product->product_discount}} </del>
                                    @else
                                        <del> {{$category_product->product_discount}}%</del>
                                    @endif
                                </div>
                                <div class="product-card__prices">
                                    <del>${{$category_product->product_selling_price}} </del>

                                </div>
                                <div class="product-card__buttons">
                                    @if (Session::has('user_id'))

                                        <?php

                                        if (Session::get('user_id')) {
                                            $id = Session::get('user_id');

                                            $auth_user = \App\Models\User::where('id', $id)->first();
                                        }

                                        ?>

                                        @if($auth_user->email_verified_at == null)
                                            <a href="{{route('auth.user.email.verify')}}" class="btn btn-primary btn-lg"> Add to Cart </a>

                                        @else
                                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $category_product->id }}" name="id">
                                            <input type="hidden" value="{{ $category_product->product_name }}" name="name">
                                            <input type="hidden" value="{{ $category_product->product_discount_price }}" name="price">
                                            <input type="hidden" value="{{ $category_product->product_image }}"  name="image">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="btn btn-primary btn-lg">Add To Cart</button>
                                        </form>
                                            @endif
                                    @else
                                        <a href="{{route('auth.user.login')}}" class="btn btn-primary btn-lg">Add to cart</a>
                                    @endif
                                    <button
                                        class="btn btn-secondary product-card__addtocart product-card__addtocart--list"
                                        type="button">Add To Cart
                                    </button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__wishlist"
                                        type="button">
                                        <svg width="16px" height="16px">
                                            <use
                                                xlink:href="{{asset('frontend')}}/images//sprite.svg#wishlist-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--wishlist-16"></span>
                                    </button>
                                    <button
                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                        type="button">
                                        <svg width="16px" height="16px">
                                            <use
                                                xlink:href="{{asset('frontend')}}/images//sprite.svg#compare-16"></use>
                                        </svg>
                                        <span class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



@endsection
