@extends('frontend.layouts.master')


@section('content')


    <div class="container">
        <div class="product product--layout--standard" data-layout="standard">
            <div class="product__content"><!-- .product__gallery -->
                <div class="product__gallery">
                    <div class="product-gallery">
                        <div class="product-gallery__featured">
                            <div class="owl-carousel" id="product-image">
                                @foreach($product_images as $key=>$data)

                                    <a href="{{asset($data)}}" target="_blank">
                                        <img src="{{asset($data)}}" alt=""> </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-gallery__carousel">
                            <div class="owl-carousel" id="product-carousel">
                                @foreach($product_images as $key=>$data)
                                    <a href="#" class="product-gallery__carousel-item">
                                        <img class="product-gallery__carousel-image"
                                             src="{{asset($data)}}" alt="">
                                    </a>
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div><!-- .product__gallery / end --><!-- .product__info -->
                <div class="product__info">
                    <div class="product__wishlist-compare">
                        <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                data-placement="right" title="Wishlist">
                            <svg width="16px" height="16px">
                                <use xlink:href="{{asset('frontend')}}/images/sprite.svg#wishlist-16"></use>
                            </svg>
                        </button>
                        <button type="button" class="btn btn-sm btn-light btn-svg-icon" data-toggle="tooltip"
                                data-placement="right" title="Compare">
                            <svg width="16px" height="16px">
                                <use xlink:href="{{asset('frontend')}}/images/sprite.svg#compare-16"></use>
                            </svg>
                        </button>
                    </div>
                    <h5 class="product__name"> {{$product->product_name}}</h5>
                    <div class="product__rating">
                        <div class="product__rating-stars">
                            <div class="rating">
                                <div class="rating__body">
                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                        <g class="rating__fill">
                                            <use
                                                xlink:href="{{asset('frontend')}}/{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                        </g>
                                        <g class="rating__stroke">
                                            <use
                                                xlink:href="{{asset('frontend')}}/{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                        </g>
                                    </svg>
                                    <div class="rating__star rating__star--only-edge rating__star--active">
                                        <div class="rating__fill">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                        <div class="rating__stroke">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                    </div>
                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                        <g class="rating__fill">
                                            <use xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                        </g>
                                        <g class="rating__stroke">
                                            <use
                                                xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                        </g>
                                    </svg>
                                    <div class="rating__star rating__star--only-edge rating__star--active">
                                        <div class="rating__fill">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                        <div class="rating__stroke">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                    </div>
                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                        <g class="rating__fill">
                                            <use xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                        </g>
                                        <g class="rating__stroke">
                                            <use
                                                xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                        </g>
                                    </svg>
                                    <div class="rating__star rating__star--only-edge rating__star--active">
                                        <div class="rating__fill">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                        <div class="rating__stroke">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                    </div>
                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                        <g class="rating__fill">
                                            <use xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                        </g>
                                        <g class="rating__stroke">
                                            <use
                                                xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                        </g>
                                    </svg>
                                    <div class="rating__star rating__star--only-edge rating__star--active">
                                        <div class="rating__fill">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                        <div class="rating__stroke">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                    </div>
                                    <svg class="rating__star rating__star--active" width="13px" height="12px">
                                        <g class="rating__fill">
                                            <use xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal"></use>
                                        </g>
                                        <g class="rating__stroke">
                                            <use
                                                xlink:href="{{asset('frontend')}}/images/sprite.svg#star-normal-stroke"></use>
                                        </g>
                                    </svg>
                                    <div class="rating__star rating__star--only-edge rating__star--active">
                                        <div class="rating__fill">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                        <div class="rating__stroke">
                                            <div class="fake-svg-icon"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product__rating-legend"><a href="#">7 Reviews</a><span>/</span><a href="#">Write
                                A Review</a></div>
                    </div>
                    <div class="product__description">
                        {!! $product->product_short_description !!}
                    </div>
                    <ul class="product__features">
                        <li>Speed: 750 RPM</li>
                        <li>Power Source: Cordless-Electric</li>
                        <li>Battery Cell Type: Lithium</li>
                        <li>Voltage: 20 Volts</li>
                        <li>Battery Capacity: 2 Ah</li>
                    </ul>
                    <ul class="product__meta">
                        <li class="product__meta-availability">Availability: <span
                                class="text-success">In Stock</span></li>
                        <li>Brand: <a href="#">{{$product_brand->brand_name}}</a></li>
                        <li>SKU:{{$product->product_sku}}</li>
                    </ul>
                </div><!-- .product__info / end --><!-- .product__sidebar -->
                <div class="product__sidebar">
                    <div class="product__availability">Availability: <span class="text-success">In Stock</span>
                    </div>
                    <div class="product__prices">${{$product->product_discount_price}}
                        <del> ${{$product->product_selling_price}} </del>
                    </div><!-- .product__options -->
                </div>
                <div class="product-card__buttons">
                    @if (Session::has('user_id'))


                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="id">
                            <input type="hidden" value="{{ $product->product_name }}" name="name">
                            <input type="hidden" value="{{ $product->product_discount_price }}" name="price">
                            <input type="hidden" value="{{ $product->product_image }}" name="image">
                            <input type="hidden" value="1" name="quantity">
                            <button class="btn btn-primary btn-lg">Add To Cart</button>
                        </form>

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
            <div class="product-tabs">
                <div class="product-tabs__list"><a href="#tab-description"
                                                   class="product-tabs__item product-tabs__item--active">Description</a>
                    <a href="#tab-specification" class="product-tabs__item">Specification</a> <a href="#tab-reviews"
                                                                                                 class="product-tabs__item">Reviews</a>
                </div>
                <div class="product-tabs__content">
                    <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                        <div class="typography">
                            <h3>Product Full Description</h3>
                            <p> {!! $product->product_description !!} </p>
                        </div>
                    </div>
                    <div class="product-tabs__pane" id="tab-specification">
                        <div class="spec">
                            <h3 class="spec__header">Specification</h3>
                            {!! $product->product_specification !!}
                        </div>
                    </div>
                    <div class="product-tabs__pane" id="tab-reviews">
                        <div class="reviews-view">
                            <div class="reviews-view__list"><h3 class="reviews-view__header">Customer Reviews</h3>
                                <div class="reviews-list">
                                    <ol class="reviews-list__content">
                                        <li class="reviews-list__item">
                                            <div class="review">
                                                <div class="review__avatar"><img src="images/avatars/avatar-1.jpg"
                                                                                 alt=""></div>
                                                <div class="review__content">
                                                    <div class="review__author">Samantha Smith</div>
                                                    <div class="review__rating">
                                                        <div class="rating">
                                                            <div class="rating__body">
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star" width="13px"
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
                                                    </div>
                                                    <div class="review__text">Phasellus id mattis nulla. Mauris
                                                        velit nisi, imperdiet vitae sodales in, maximus ut lectus.
                                                        Vivamus commodo scelerisque lacus, at porttitor dui iaculis
                                                        id. Curabitur imperdiet ultrices fermentum.
                                                    </div>
                                                    <div class="review__date">27 May, 2018</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="reviews-list__item">
                                            <div class="review">
                                                <div class="review__avatar"><img src="images/avatars/avatar-2.jpg"
                                                                                 alt=""></div>
                                                <div class="review__content">
                                                    <div class="review__author">Adam Taylor</div>
                                                    <div class="review__rating">
                                                        <div class="rating">
                                                            <div class="rating__body">
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star" width="13px"
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
                                                                <div class="rating__star rating__star--only-edge">
                                                                    <div class="rating__fill">
                                                                        <div class="fake-svg-icon"></div>
                                                                    </div>
                                                                    <div class="rating__stroke">
                                                                        <div class="fake-svg-icon"></div>
                                                                    </div>
                                                                </div>
                                                                <svg class="rating__star" width="13px"
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
                                                    </div>
                                                    <div class="review__text">Aenean non lorem nisl. Duis tempor
                                                        sollicitudin orci, eget tincidunt ex semper sit amet. Nullam
                                                        neque justo, sodales congue feugiat ac, facilisis a augue.
                                                        Donec tempor sapien et fringilla facilisis. Nam maximus
                                                        consectetur diam. Nulla ut ex mollis, volutpat tellus vitae,
                                                        accumsan ligula.
                                                    </div>
                                                    <div class="review__date">12 April, 2018</div>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="reviews-list__item">
                                            <div class="review">
                                                <div class="review__avatar"><img src="images/avatars/avatar-3.jpg"
                                                                                 alt=""></div>
                                                <div class="review__content">
                                                    <div class="review__author">Helena Garcia</div>
                                                    <div class="review__rating">
                                                        <div class="rating">
                                                            <div class="rating__body">
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                                <svg class="rating__star rating__star--active"
                                                                     width="13px" height="12px">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="review__text">Duis ac lectus scelerisque quam
                                                        blandit egestas. Pellentesque hendrerit eros laoreet
                                                        suscipit ultrices.
                                                    </div>
                                                    <div class="review__date">2 January, 2018</div>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                    <div class="reviews-list__pagination">
                                        <ul class="pagination justify-content-center">
                                            <li class="page-item disabled"><a
                                                    class="page-link page-link--with-arrow" href="#"
                                                    aria-label="Previous">
                                                    <svg class="page-link__arrow page-link__arrow--left"
                                                         aria-hidden="true" width="8px" height="13px">
                                                        <use
                                                            xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-left-8x13"></use>
                                                    </svg>
                                                </a></li>
                                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item active"><a class="page-link" href="#">2 <span
                                                        class="sr-only">(current)</span></a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link page-link--with-arrow"
                                                                     href="#" aria-label="Next">
                                                    <svg class="page-link__arrow page-link__arrow--right"
                                                         aria-hidden="true" width="8px" height="13px">
                                                        <use
                                                            xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-right-8x13"></use>
                                                    </svg>
                                                </a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <form class="reviews-view__form"><h3 class="reviews-view__header">Write A Review</h3>
                                <div class="row">
                                    <div class="col-12 col-lg-9 col-xl-8">
                                        <div class="form-row">
                                            <div class="form-group col-md-4"><label for="review-stars">Review
                                                    Stars</label> <select id="review-stars" class="form-control">
                                                    <option>5 Stars Rating</option>
                                                    <option>4 Stars Rating</option>
                                                    <option>3 Stars Rating</option>
                                                    <option>2 Stars Rating</option>
                                                    <option>1 Stars Rating</option>
                                                </select></div>
                                            <div class="form-group col-md-4"><label for="review-author">Your
                                                    Name</label> <input type="text" class="form-control"
                                                                        id="review-author" placeholder="Your Name">
                                            </div>
                                            <div class="form-group col-md-4"><label for="review-email">Email
                                                    Address</label> <input type="text" class="form-control"
                                                                           id="review-email"
                                                                           placeholder="Email Address"></div>
                                        </div>
                                        <div class="form-group"><label for="review-text">Your Review</label>
                                            <textarea class="form-control" id="review-text" rows="6"></textarea>
                                        </div>
                                        <div class="form-group mb-0">
                                            <button type="submit" class="btn btn-primary btn-lg">Post Your Review
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3> May You Like </h3>
                </div>
            </div>
            <div class="row">
                @foreach($brand_products as $brand_product)
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
                                    ${{$brand_product->product_discount_price}}
                                    @if($brand_product->product_discount_type == 1)
                                        <del> ${{$brand_product->product_discount}} </del>
                                    @else
                                        <del> {{$brand_product->product_discount}}%</del>
                                    @endif
                                </div>
                                <div class="product-card__prices">
                                    <del>${{$brand_product->product_selling_price}} </del>

                                </div>
                                <div class="product-card__buttons">


                                    @if (Session::has('user_id'))
                                        <form action="{{ route('cart.store') }}" method="POST"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $brand_product->id }}" name="id">
                                            <input type="hidden" value="{{ $brand_product->product_name }}" name="name">
                                            <input type="hidden" value="{{ $brand_product->product_discount_price }}"
                                                   name="price">
                                            <input type="hidden" value="{{ $brand_product->product_image }}"
                                                   name="image">
                                            <input type="hidden" value="1" name="quantity">
                                            <button class="btn btn-primary btn-lg">Add To Cart</button>
                                        </form>
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



@endsection
