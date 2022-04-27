<header class="site__header d-lg-block d-none">
    <div class="site-header"><!-- .topbar -->
        <div class="site-header__topbar topbar">
            <div class="topbar__container container">
                <div class="topbar__row">
                    <div class="topbar__item topbar__item--link"><a class="topbar-link" href="about-us.html">About
                            Us</a></div>
                    <div class="topbar__item topbar__item--link"><a class="topbar-link"
                                                                    href="contact-us.html">Contacts</a></div>
                    <div class="topbar__item topbar__item--link"><a class="topbar-link" href="#">Store Location</a>
                    </div>
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
                                    class="topbar__item-value">USD</span>
                                <svg width="7px" height="5px">
                                    <use
                                        xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-7x5"></use>
                                </svg>
                            </button>
                            <div class="topbar-dropdown__body"><!-- .menu -->
                                <ul class="menu menu--layout--topbar">
                                    <li><a href="#">€ Euro</a></li>
                                    <li><a href="#">£ Pound Sterling</a></li>
                                    <li><a href="#">$ US Dollar</a></li>
                                    <li><a href="#">₽ Russian Ruble</a></li>
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
                            <div class="departments" data-departments-fixed-by="">
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
                                <li class="nav-links__item nav-links__item--with-submenu"><a href="index.html"><span>Home <svg
                                                class="nav-links__arrow" width="9px" height="6px"><use
                                                    xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                    <div class="nav-links__menu"><!-- .menu -->
                                        <ul class="menu menu--layout--classic">
                                            <li><a href="index.html">Home 1</a></li>
                                            <li><a href="index-2.html">Home 2</a></li>
                                        </ul><!-- .menu / end --></div>
                                </li>
                                <li class="nav-links__item nav-links__item--with-submenu"><a href="#"><span>Megamenu <svg
                                                class="nav-links__arrow" width="9px" height="6px"><use
                                                    xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                    <div class="nav-links__megamenu nav-links__megamenu--size--nl" style="left: 355px;">
                                        <!-- .megamenu -->
                                        <div class="megamenu">
                                            <div class="row">
                                                <div class="col-6">
                                                    <ul class="megamenu__links megamenu__links--level--0">
                                                        <li class="megamenu__item megamenu__item--with-submenu"><a
                                                                href="#">Power Tools</a>
                                                            <ul class="megamenu__links megamenu__links--level--1">
                                                                <li class="megamenu__item"><a href="#">Engravers</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Wrenches</a></li>
                                                                <li class="megamenu__item"><a href="#">Wall Chaser</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Pneumatic
                                                                        Tools</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="megamenu__item megamenu__item--with-submenu"><a
                                                                href="#">Machine Tools</a>
                                                            <ul class="megamenu__links megamenu__links--level--1">
                                                                <li class="megamenu__item"><a href="#">Thread
                                                                        Cutting</a></li>
                                                                <li class="megamenu__item"><a href="#">Chip Blowers</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Sharpening
                                                                        Machines</a></li>
                                                                <li class="megamenu__item"><a href="#">Pipe Cutters</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Slotting
                                                                        machines</a></li>
                                                                <li class="megamenu__item"><a href="#">Lathes</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="col-6">
                                                    <ul class="megamenu__links megamenu__links--level--0">
                                                        <li class="megamenu__item megamenu__item--with-submenu"><a
                                                                href="#">Hand Tools</a>
                                                            <ul class="megamenu__links megamenu__links--level--1">
                                                                <li class="megamenu__item"><a href="#">Screwdrivers</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Handsaws</a></li>
                                                                <li class="megamenu__item"><a href="#">Knives</a></li>
                                                                <li class="megamenu__item"><a href="#">Axes</a></li>
                                                                <li class="megamenu__item"><a href="#">Multitools</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Paint Tools</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li class="megamenu__item megamenu__item--with-submenu"><a
                                                                href="#">Garden Equipment</a>
                                                            <ul class="megamenu__links megamenu__links--level--1">
                                                                <li class="megamenu__item"><a href="#">Motor Pumps</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Chainsaws</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Electric Saws</a>
                                                                </li>
                                                                <li class="megamenu__item"><a href="#">Brush Cutters</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .megamenu / end --></div>
                                </li>
                                <li class="nav-links__item nav-links__item--with-submenu"><a
                                        href="shop-grid-3-columns-sidebar.html"><span>Shop <svg class="nav-links__arrow"
                                                                                                width="9px"
                                                                                                height="6px"><use
                                                    xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                    <div class="nav-links__menu"><!-- .menu -->
                                        <ul class="menu menu--layout--classic">
                                            <li><a href="shop-grid-3-columns-sidebar.html">Shop Grid
                                                    <svg class="menu__arrow" width="6px" height="9px">
                                                        <use
                                                            xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg>
                                                </a>
                                                <div class="menu__submenu"><!-- .menu -->
                                                    <ul class="menu menu--layout--classic">
                                                        <li><a href="shop-grid-3-columns-sidebar.html">3 Columns
                                                                Sidebar</a></li>
                                                        <li><a href="shop-grid-4-columns-full.html">4 Columns Full</a>
                                                        </li>
                                                        <li><a href="shop-grid-5-columns-full.html">5 Columns Full</a>
                                                        </li>
                                                    </ul><!-- .menu / end --></div>
                                            </li>
                                            <li><a href="shop-list.html">Shop List</a></li>
                                            <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                            <li><a href="product.html">Product
                                                    <svg class="menu__arrow" width="6px" height="9px">
                                                        <use
                                                            xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                                    </svg>
                                                </a>
                                                <div class="menu__submenu"><!-- .menu -->
                                                    <ul class="menu menu--layout--classic">
                                                        <li><a href="product.html">Product</a></li>
                                                        <li><a href="product-alt.html">Product Alt</a></li>
                                                        <li><a href="product-sidebar.html">Product Sidebar</a></li>
                                                    </ul><!-- .menu / end --></div>
                                            </li>
                                            <li><a href="cart.html">Cart</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="compare.html">Compare</a></li>
                                            <li><a href="account.html">My Account</a></li>
                                            <li><a href="track-order.html">Track Order</a></li>
                                        </ul><!-- .menu / end --></div>
                                </li>
                                <li class="nav-links__item nav-links__item--with-submenu"><a
                                        href="blog-classic.html"><span>Blog <svg class="nav-links__arrow" width="9px"
                                                                                 height="6px"><use
                                                    xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                    <div class="nav-links__menu"><!-- .menu -->
                                        <ul class="menu menu--layout--classic">
                                            <li><a href="blog-classic.html">Blog Classic</a></li>
                                            <li><a href="blog-grid.html">Blog Grid</a></li>
                                            <li><a href="blog-list.html">Blog List</a></li>
                                            <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                            <li><a href="post.html">Post Page</a></li>
                                            <li><a href="post-without-sidebar.html">Post Without Sidebar</a></li>
                                        </ul><!-- .menu / end --></div>
                                </li>
                                <li class="nav-links__item nav-links__item--with-submenu"><a href="#"><span>Pages <svg
                                                class="nav-links__arrow" width="9px" height="6px"><use
                                                    xlink:href="{{asset('frontend')}}/images/sprite.svg#arrow-rounded-down-9x6"></use></svg></span></a>
                                    <div class="nav-links__menu"><!-- .menu -->
                                        <ul class="menu menu--layout--classic">
                                            <li><a href="about-us.html">About Us</a></li>
                                            <li><a href="contact-us.html">Contact Us</a></li>
                                            <li><a href="contact-us-alt.html">Contact Us Alt</a></li>
                                            <li><a href="404.html">404</a></li>
                                            <li><a href="terms-and-conditions.html">Terms And Conditions</a></li>
                                            <li><a href="faq.html">FAQ</a></li>
                                            <li><a href="components.html">Components</a></li>
                                            <li><a href="typography.html">Typography</a></li>
                                        </ul><!-- .menu / end --></div>
                                </li>
                                <li class="nav-links__item"><a href="contact-us.html"><span>Contact Us</span></a></li>
                                <li class="nav-links__item"><a href="https://themeforest.net/user/kos9/portfolio"><span>Buy Theme</span></a>
                                </li>
                            </ul>
                        </div><!-- .nav-links / end -->
                        <div class="nav-panel__indicators">
                            <div class="indicator"><a href="{{route('cart.list')}}" class="indicator__button"><span
                                        class="indicator__area"><svg width="20px" height="20px"><use
                                                xlink:href="{{asset('frontend')}}/images/sprite.svg#heart-20"></use></svg> <span
                                            class="indicator__value">0</span></span></a>
                            </div>

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
