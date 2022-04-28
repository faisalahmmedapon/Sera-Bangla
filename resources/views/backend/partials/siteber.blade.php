<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('backend')}}/assets/img/user2-160x160.jpg" class="img-circle elevation-2"
                 alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"> Faisal Ahmmed Apon </a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Slider Management <i class="fa fa-caret-down right" aria-hidden="true"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('slider.index')}}" class="nav-link">
                            Sliders <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>
                </ul>
            </li>



            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Users Management <i class="fa fa-caret-down right" aria-hidden="true"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('user.index')}}" class="nav-link">
                            Users <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>


                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Products Management <i class="fa fa-caret-down right" aria-hidden="true"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{route('coupon.index')}}" class="nav-link">
                            Coupons <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('brand.index')}}" class="nav-link">
                            Brands <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('size.index')}}" class="nav-link">
                            Sizes <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('material.index')}}" class="nav-link">
                            Materials <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('color.index')}}" class="nav-link">
                            Colors <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('category.index')}}" class="nav-link">
                            Categories <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('product.index')}}" class="nav-link">
                            Products <i class="fa fa-angle-double-right right" aria-hidden="true"></i>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <p>
                        Order Management <i class="fa fa-caret-down right" aria-hidden="true"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">

                    <li class="nav-item">
                        <a href="{{route('pending.order')}}" class="nav-link">
                            Pending Order <i class="fa fa-angle-double-right right" aria-hidden="true"></i>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('review.order')}}" class="nav-link">
                            Review Order <i class="fa fa-angle-double-right right" aria-hidden="true"></i>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('accept.order')}}" class="nav-link">
                            Accept Order <i class="fa fa-angle-double-right right" aria-hidden="true"></i>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('confirm.order')}}" class="nav-link">
                            Confirm Order <i class="fa fa-angle-double-right right" aria-hidden="true"></i>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('canceled.order')}}" class="nav-link">
                            Canceled Review <i class="fa fa-angle-double-right right" aria-hidden="true"></i>

                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('processing.order')}}" class="nav-link">
                            Processing Review <i class="fa fa-angle-double-right right" aria-hidden="true"></i>

                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('completed.order')}}" class="nav-link">
                            Completed Order <i class="fa fa-angle-double-right right" aria-hidden="true"></i>

                        </a>
                    </li>


                    <li class="nav-item">
                        <a href="{{route('order.index')}}" class="nav-link">
                            All Order <i class="fa fa-angle-double-right right" aria-hidden="true"></i>

                        </a>
                    </li>

                </ul>
            </li>


            <li class="nav-header">Nav Header</li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Documentation</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
