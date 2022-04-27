<div class="block block-sidebar">
    <div class="block-sidebar__item">
        <div class="widget-categories widget-categories--location--shop widget"><h4
                class="widget__title"> Profile </h4>
            <ul class="widget-categories__list" data-collapse=""
                data-collapse-opened-class="widget-categories__item--open">

                <li class="widget-categories__item" data-collapse-item="">
                    <div class="widget-categories__row">
                        <a href="{{route('auth.user.logout')}}">Logout</a>
                    </div>
                </li>
                <li class="widget-categories__item" data-collapse-item="">
                    <div class="widget-categories__row">
                        <a href="{{route('auth.user.orders')}}"> Orders </a>
                    </div>
                </li>
                <li class="widget-categories__item" data-collapse-item="">
                    <div class="widget-categories__row">
                        <a href="{{route('auth.user.profile')}}"> Profile </a>
                    </div>
                </li>
                <li class="widget-categories__item" data-collapse-item="">
                    <div class="widget-categories__row">
                        <a href="{{route('auth.user.email.verify')}}"> Email Verify </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
