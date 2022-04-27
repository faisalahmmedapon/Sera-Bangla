@extends('frontend.layouts.master')


@section('content')


    <div class="site__body"><!-- .block-slideshow -->
        <div class="block-slideshow block-slideshow--layout--with-departments block">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-9 offset-lg-3">
                        <div class="block-slideshow__body">
                            <div class="owl-carousel">
                                @foreach($slider_products as $slider_product)
                                    <?php
                                    $slider_product_images = json_decode($slider_product->product_image);
                                    $slider_product_images_one = $slider_product_images[0];
                                    //dd($product_images_one)
                                    ?>
                                    <a class="block-slideshow__slide"
                                       href="{{route('frontend.product.details',$slider_product->product_name_slug)}}">
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                             style="background-image: url('{{asset($slider_product_images_one)}}')"></div>
                                        <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                             style="background-image: url('{{asset($slider_product_images_one)}}')"></div>
                                        <div class="block-slideshow__slide-content">
                                            <div class="block-slideshow__slide-title">{{$slider_product->product_name}}
                                            </div>
                                            <div
                                                class="block-slideshow__slide-text"> {!! Str::limit($slider_product->product_short_description,400) !!}
                                            </div>
                                            <div class="block-slideshow__slide-button">
                                                <span class="btn btn-primary btn-lg">Shop Now</span>
                                            </div>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .block-slideshow / end --><!-- .block-features -->
        <div class="block block-features block-features--layout--classic">
            <div class="container">
                <div class="block-features__list">
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="{{asset('frontend')}}/images//sprite.svg#fi-free-delivery-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Free Shipping</div>
                            <div class="block-features__subtitle">For orders from $50</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="{{asset('frontend')}}/images//sprite.svg#fi-24-hours-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Support 24/7</div>
                            <div class="block-features__subtitle">Call us anytime</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="{{asset('frontend')}}/images//sprite.svg#fi-payment-security-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">100% Safety</div>
                            <div class="block-features__subtitle">Only secure payments</div>
                        </div>
                    </div>
                    <div class="block-features__divider"></div>
                    <div class="block-features__item">
                        <div class="block-features__icon">
                            <svg width="48px" height="48px">
                                <use xlink:href="{{asset('frontend')}}/images//sprite.svg#fi-tag-48"></use>
                            </svg>
                        </div>
                        <div class="block-features__content">
                            <div class="block-features__title">Hot Offers</div>
                            <div class="block-features__subtitle">Discounts up to 90%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container py-4">
            <div class="row">
                <div class="col-md-12">
                    <h3> New Products </h3>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                    <div class="col-md-4">


                        <?php
                        $product_images = json_decode($product->product_image);
                        $product_images_one = $product_images[0];
                        //dd($product_images_one)
                        ?>
                        <div class="product-card  p-3">
                            <button class="product-card__quickview" type="button">
                                <svg width="16px" height="16px">
                                    <use
                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#quickview-16"></use>
                                </svg>
                                <span class="fake-svg-icon"></span></button>
                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--new">New</div>
                            </div>
                            <div class="product-card__image"><a
                                    href="{{route('frontend.product.details',$product->product_name_slug)}}"><img
                                        src="{{asset($product_images_one)}}" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a
                                        href="{{route('frontend.product.details',$product->product_name_slug)}}"> {{Str::limit($product->product_name,70)}}</a>
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
                                    ${{$product->product_discount_price}}
                                    @if($product->product_discount_type == 1)
                                        <del> ${{$product->product_discount}} </del>
                                    @else
                                        <del> {{$product->product_discount}}%</del>
                                    @endif
                                </div>
                                <div class="product-card__prices">
                                    <del>${{$product->product_selling_price}} </del>

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
                                            <form action="{{ route('cart.store') }}" method="POST"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" value="{{ $product->id }}" name="id">
                                                <input type="hidden" value="{{ $product->product_name }}" name="name">
                                                <input type="hidden" value="{{ $product->product_discount_price }}"
                                                       name="price">
                                                <input type="hidden" value="{{ $product->product_image }}" name="image">
                                                <input type="hidden" value="1" name="quantity">
                                                <button class="btn btn-primary btn-lg">Add To Cart</button>
                                            </form>
                                        @endif



                                        {{--                                        <a href="{{route('auth.user.login')}}" class="btn btn-danger btn-lg">Add to cart</a>--}}
                                    @else
                                        <a href="{{route('auth.user.login')}}" class="btn btn-primary btn-lg">Add to
                                            cart</a>
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


        <div class="block block--highlighted block-categories block-categories--layout--classic">
            <div class="container">
                <div class="block-header"><h3 class="block-header__title">Popular Categories</h3>
                    <div class="block-header__divider"></div>
                </div>
                <div class="block-categories__list">

                    @foreach($categories as $category)
                        <div class="block-categories__item category-card category-card--layout--classic">
                            <div class="category-card__body">
                                <div class="category-card__image">
                                    <a href="{{route('frontend.product.category',$category->category_name_slug)}}">
                                        <img src="{{asset($category->category_logo)}}"
                                             alt="">
                                    </a>
                                </div>
                                <div class="category-card__content">
                                    <div class="category-card__name"><a
                                            href="{{route('frontend.product.category',$category->category_name_slug)}}"> {{$category->category_name}}</a>
                                    </div>
                                    <div class="category-card__all"><a
                                            href="{{route('frontend.product.category',$category->category_name_slug)}}">Show
                                            All</a></div>
                                    <div class="category-card__products">572 Products</div>
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>



@endsection
