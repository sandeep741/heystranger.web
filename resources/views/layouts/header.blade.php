<header id="main-header" class="st_menu" >
    <div class="header-top ">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <a class="logo" href="#">
                        <img  width='110px' height ='40px'  src="{{ asset('/assets/images/logo-white.png') }}" alt="logo" title="Traveler">
                    </a>
                </div>
                <div class="col-md-9">
                    <div class="top-user-area clearfix">
                        <ul class="top-user-area-list list list-horizontal list-border">

                            @if(Auth::check())
                            <li class="top-user-area-avatar">
                                <a href="#">
                                    <img alt="avatar" width=40 height=40 src="{{ asset('/assets/images/1-339crqgskq7y3gptopwykg.jpg') }}" class="avatar avatar-96 photo origin round" >{{ Auth::user() ? Auth::user()->name : '' }}</a>
                            </li>

                            <li>
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
                            <li>
                                <a class="btn-st-logout" href="{{ route('login') }}">
                                    Login
                                </a>
                            </li>
                            @endif

                            <li class="nav-drop nav-symbol">
                                <a class="cursor" >Rand

                                </a>
                                <ul class="list nav-drop-menu">
                                    <li><a href="#">EUR<span class="right">€</span></a>
                                    </li>
                                    <li><a href="#">GBP<span class="right">£</span></a>
                                    </li>
                                    <li><a href="#">VND<span class="right">vnd</span></a>
                                    </li>
                                </ul>
                            </li>
                            <li class="top-user-area-lang nav-drop">
                                <a href="#" class="current_langs">
                                    <img  height="12px" width= "18px" src="{{ asset('/assets/images/en.png') }}" alt="English" title="English">English<i class="fa fa-angle-down"></i><i class="fa fa-angle-up"></i>
                                </a>
                                <ul class="list nav-drop-menu" style="min-width:120px">
                                    <li>
                                        <a title="Français" href="#">
                                            <img height="12px" width= "18px" src="{{ asset('/assets/images/fr.png') }}" alt="Français" title="Français"><span class="right">Français</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a title="Deutsch" href="#">
                                            <img height="12px" width= "18px" src="{{ asset('/assets/images/de.png') }}" alt="Deutsch" title="Deutsch"><span class="right">Deutsch</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                        </ul>
                        <form class="main-header-search" action="#" method="get">
                            <div class="form-group form-group-icon-left">
                                <i class="fa fa-search input-icon"></i>
                                <input type="text" placeholder="" data-lang="en" name="s" value="" class="form-control st-top-ajax-search">
                                <input type="hidden" name="post_type" value="post">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main_menu_wrap" id="menu1">
        <div class="container">
