<div class="nav">
    <ul id="slimmenu" data-title="<a href='{{ route('home') }}'><img width=auto height=40px class=st_logo_mobile src={{ asset('/assets/images/logo-white.png') }} /></a>" class="menu slimmenu">
        <li id="menu-item-1285" class="menu-item menu-item-type-post_type menu-item-object-page {{ Request::is( '/') ? 'current-menu-ancestor' : '' }} current-menu-parent current_page_parent current_page_ancestor menu-item-has-children menu-item-1285">
            <a href="{{ route('home') }}">Home</a>

        </li>

        <li id="menu-item-1296" class="menu-item {{ Request::is( 'accommodation') ? 'current-menu-ancestor' : '' }} menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1296">
            <a href="{{ route('accommodation') }}">Accommodations</a>

        </li>
        <li id="menu-item-1286" class="menu-item {{ Request::is( 'my-package') ? 'current-menu-ancestor' : '' }} menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1286">
            <a href="{{ route('my_package') }}">Package</a>

        </li>
        <li id="menu-item-1349" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-1349">
            <a href="#">Register</a>

        </li>

        @if(Auth::check())
        <li id="menu-item-4715" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4715">
            <a class="btn-st-logout" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                Sign Out
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                <input type="hidden" name="flag" value="2" >
                {{ csrf_field() }}
            </form>

        </li>
        @else
        <li id="menu-item-4715" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4715">
            <a href="{{ route('login') }}">Login</a>

        </li>
        @endif

        <li id="menu-item-4715" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-4715">
            <a href="#">Contact Us</a>

        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  slimmenu-sub-menu st_menu_mobile_new top-user-area-avatar" style="display: none" >
            <a href="#">
                <img alt="avatar" width=40 height=40 src="{{ asset('/assets/images/1-339crqgskq7y3gptopwykg.jpg') }}" class="avatar avatar-96 photo origin round" > Hey Stranger            </a>
        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  slimmenu-sub-menu st_menu_mobile_new" style="display: none">
            <a href="#">
                Sign Out            </a>
        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  slimmenu-sub-menu st_menu_mobile_new" >
            <a href="#">English <img  height="12px" width= "18px" src="{{ asset('/assets/images/en.png') }}" alt="English" title="English"></a>
            <ul class="sub-menu" style="display: none;">
                <li>
                    <a title="Français" href="#">
                        <span class="right">Français</span> <img height="12px" width= "18px" src="{{ asset('/assets/images/fr.png') }}" alt="Français" title="Français">
                    </a>
                </li>
                <li>
                    <a title="Deutsch" href="#">
                        <span class="right">Deutsch</span> <img height="12px" width= "18px" src="{{ asset('/assets/images/de.png') }}" alt="Deutsch" title="Deutsch">
                    </a>
                </li>
            </ul>
        </li>
        <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children  slimmenu-sub-menu st_menu_mobile_new" style="display: none" >
            <a href="#">
                USD $
            </a>
            <ul class="sub-menu" style="display: none;">
                <li><a href="#"> EUR <span class="right"> € </span></a>
                </li>
                <li><a href="#"> GBP <span class="right"> £ </span></a>
                </li>
                <li><a href="#"> VND <span class="right"> vnd </span></a>
                </li>
            </ul>
        </li>
    </ul>
</div>