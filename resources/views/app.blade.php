<!DOCTYPE html>
<html>
    <head>
        @include('layouts.head')
    </head>
    <body class="page-template page-template-template-home page-template-template-home-php page page-id-453 logged-in  wide menu_style1 topbar_position_default enable_sticky_menu wpb-js-composer js-comp-ver-5.0 vc_responsive">
      <div id="st_header_wrap" class="global-wrap header-wrap container-fluid">
         <div class="row" id="st_header_wrap_inner">
            <div id='top_toolbar' class="hidden_topbar_in_mobile" style= 'background-color: #333 ' >
               <div class='container'>
                  <div class="row">
                     <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-left left_topbar'>
                        <!--     -->
                        <ul class="top-user-area-list list list-horizontal list-border clearfix">
                           <li><a href="#" target=""> <i class="fa fa-facebook mr5"></i></a></li>
                           <li><a href="#" target=""> <i class="fa fa-twitter mr5"></i></a></li>
                           <li><a href="#" target=""> <i class="fa fa-linkedin mr5"></i></a></li>
                           <li><a href="#" target=""> <i class="fa fa-google-plus mr5"></i></a></li>
                        </ul>
                     </div>
                     <div class='col-lg-6 col-md-6 col-sm-12 col-xs-12 text-right right_topbar top-user-area'>
                        <!--    -->
                        <ul class="top-user-area-list list list-horizontal list-border clearfix">
                           <li><a href="" target=""> <i class="fa  mr5"></i>Call us: +27 81 740 0107</a></li>
                           <li><a href="#" target=""> <i class="fa fa-envelope-o mr5"></i>info@heystranger.co.za</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            @include('layouts.header')
            @include('layouts.navbar')
        </div>
    </div>
    <!-- End .main_menu_wrap-->
</header>
         </div>
      </div>
      @yield('content')
      @include('layouts.footer')
   </body>
</html>