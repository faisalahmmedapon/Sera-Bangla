<header class="site__header d-lg-block d-none">
    <div class="site-header"><!-- .topbar -->
        <div class="site-header__topbar topbar">
            <div class="topbar__container container">
                <div class="topbar__row">
                    <div class="topbar__item topbar__item--link"><a class="topbar-link" href="about-us.html">About
                            Us</a></div>
                    <div class="topbar__item topbar__item--link"><a class="topbar-link"
                                                                    href="contact-us.html">Contacts</a></div>

                    <div class="topbar__item topbar__item--link"><a class="topbar-link" href="track-order.html">Track
                            Order</a></div>
                    <div class="topbar__item topbar__item--link"><a class="topbar-link"
                                                                    href="blog-classic.html">Blog</a></div>
                    <div class="topbar__spring"></div>
                    <div class="topbar__item">
                        <div class="topbar-dropdown">
                            <button class="topbar-dropdown__btn" type="button">My Account
                                <svg width="7px" height="5px">
                                    <use
                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg>
                            </button>
                            <div class="topbar-dropdown__body"><!-- .menu -->
                                <ul class="menu menu--layout--topbar">

                                    @if (Session::has('user_id'))
                                        <li><a href="{{route('auth.user.dashboard')}}">Dashboard</a></li>
                                        <li><a href="{{route('auth.user.orders')}}">Orders</a></li>
                                    @else
                                        <li><a href="{{route('auth.user.login.page')}}">Login</a></li>
                                        <li><a href="{{route('auth.user.register.page')}}">Register</a></li>
                                    @endif
                                </ul><!-- .menu / end --></div>
                        </div>
                    </div>
                    <div class="topbar__item">
                        <div class="topbar-dropdown">
                            <button class="topbar-dropdown__btn" type="button">Currency: <span
                                    class="topbar__item-value">BDT</span>
                                <svg width="7px" height="5px">
                                    <use
                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg>
                            </button>
                            <div class="topbar-dropdown__body"><!-- .menu -->
                                <ul class="menu menu--layout--topbar">
                                    <li><a href="#">৳ Taka</a></li>
                                </ul><!-- .menu / end --></div>
                        </div>
                    </div>
                    <div class="topbar__item">
                        <div class="topbar-dropdown">
                            <button class="topbar-dropdown__btn" type="button">Language: <span
                                    class="topbar__item-value">EN</span>
                                <svg width="7px" height="5px">
                                    <use
                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg>
                            </button>
                            <div class="topbar-dropdown__body"><!-- .menu -->
                                <ul class="menu menu--layout--topbar menu--with-icons">
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="images/languages/language-1.png, images/languages/language-1@2x.png 2x"
                                                    src="images/languages/language-1.png" alt=""></div>
                                            English</a></li>
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="images/languages/language-2.png, images/languages/language-2@2x.png 2x"
                                                    src="images/languages/language-2.png" alt=""></div>
                                            French</a></li>
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="images/languages/language-3.png, images/languages/language-3@2x.png 2x"
                                                    src="images/languages/language-3.png" alt=""></div>
                                            German</a></li>
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="images/languages/language-4.png, images/languages/language-4@2x.png 2x"
                                                    src="images/languages/language-4.png" alt=""></div>
                                            Russian</a></li>
                                    <li><a href="#">
                                            <div class="menu__icon"><img
                                                    srcset="images/languages/language-5.png, images/languages/language-5@2x.png 2x"
                                                    src="images/languages/language-5.png" alt=""></div>
                                            Italian</a></li>
                                </ul><!-- .menu / end --></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .topbar / end -->
        <div class="site-header__middle container">
            <div class="site-header__logo"><a href="{{url('/')}}">
                    <img class="img-fluid" src="{{asset('frontend/images/logos')}}/header_logo.png">
                </a></div>
            <div class="site-header__search">
                <div class="search">
                    <form class="search__form" action="#"><input class="search__input" name="search"
                                                                 placeholder="Search over 10,000 products"
                                                                 aria-label="Site search" type="text"
                                                                 autocomplete="off">
                        <button class="search__button" type="submit">
                            <svg width="20px" height="20px">
                                <use xlink:href="{{asset('frontend')}}/images/sprite.svg#search-20"></use>
                            </svg>
                        </button>
                        <div class="search__border"></div>
                    </form>
                </div>
            </div>
            <div class="site-header__phone">
                <div class="site-header__phone-title">Customer Service</div>
                <div class="site-header__phone-number">+8801307788699</div>
            </div>
        </div>
        <div class="site-header__nav-panel">
            <div class="nav-panel">
                <div class="nav-panel__container container">
                    <div class="nav-panel__row">
                        <div class="nav-panel__departments"><!-- .departments -->
                            <div
                                class=" @if(Request::is('/')) departments  departments--opened @else departments @endif "
                                data-departments-fixed-by="">
                                <div class="departments__body">
                                    <div class="departments__links-wrapper" style="">
                                        <ul class="departments__links">
                                            @foreach($categories as $category)
                                                <li class="departments__item">
                                                    <a href="{{route('frontend.product.category',$category->category_name_slug)}}">{{$category->category_name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <button class="departments__button">
                                    <svg class="departments__button-icon" width="18px" height="14px">
                                        <use xlink:href="{{asset('frontend')}}/images/sprite.svg#menu-18x14"></use>
                                    </svg>
                                    Shop By Category
                                    <svg class="departments__button-arrow" width="9px" height="6px">
                                        <use
                                            xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-9x6"></use>
                                    </svg>
                                </button>
                            </div><!-- .departments / end --></div><!-- .nav-links -->
                        <div class="nav-panel__nav-links nav-links">
                            <ul class="nav-links__list">

                                <li class="nav-links__item"><a href="{{url('/')}}"><span>Home</span></a></li>
                                <li class="nav-links__item"><a href=""><span>Contact Us</span></a></li>
                                </li>
                            </ul>
                        </div><!-- .nav-links / end -->
                        <div class="nav-panel__indicators">
                            {{--                            <div class="indicator"><a href="{{route('cart.list')}}" class="indicator__button"><span--}}
                            {{--                                        class="indicator__area"><svg width="20px" height="20px"><use--}}
                            {{--                                                xlink:href="{{asset('frontend')}}/images/sprite.svg#profile-20"></use></svg> <span--}}
                            {{--                                            class="indicator__value">0</span></span></a>--}}
                            {{--                            </div>--}}

                            <?php

                            $cartCollection = \Cart::getContent();

                            //                            $cartCollection->count();

                            ?>
                            <div class="indicator"><a href="{{route('cart.list')}}" class="indicator__button"><span
                                        class="indicator__area"><svg width="20px" height="20px"><use
                                                xlink:href="{{asset('frontend')}}/images/sprite.svg#cart-20"></use></svg> <span
                                            class="indicator__value">
                                                {{$cartCollection->count()}}
                                        </span></span></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>


