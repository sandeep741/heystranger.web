<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <a href="javascript:void;" class="media-left"><img src="{{ asset('/assets/admin/images/face11.jpg') }}" class="img-circle img-sm" alt=""></a>
                    <div class="media-body">
                        <span class="media-heading text-semibold">{{ ($user ? $user->name : '') }}</span>
                        <div class="text-size-mini text-muted">
                            <i class="icon-pin text-size-small"></i> &nbsp;South Africa
                        </div>
                    </div>
                    <div class="media-right media-middle">
                        <ul class="icons-list">
                            <li>
                                <a href="javascript:void;"><i class="icon-cog3"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <!-- Main -->
                    <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
                    
                    
                    @if(isset($user) && $user->role[0]->name == 'partner')
                    <li class="{{ Request::is( 'welcome-page') ? 'active' : '' }}"><a href="{{ route('welcome_page') }}"><i class="icon-home4"></i> <span>Welcome Page</span></a></li>
                    @endif
                    
                    <li class="{{ Request::is( 'dashboard', 'partner-dashboard') ? 'active' : '' }}"><a href="{{ route('admin.login') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    @if(isset($user) && $user->role[0]->name == 'partner')
                    
                    @if(Auth::user()->status == '2')
                    <li class="{{ Request::is( 'proof-payment') ? 'active' : '' }}">
                        <a href="javascript:void;"><i class="icon-stack2"></i> <span>Proof of Payment</span></a>
                        <ul>
                            <li><a href="{{ route("proof_payment") }}" style="{{ (Request::is( 'proof-payment') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Upload Proof</a></li>
                        </ul>
                    </li>
                    @endif
                    
                    <li class="{{ Request::is( 'accomodation', 'accomodation/*') ? 'active' : '' }}">
                        <a href="javascript:void;"><i class="icon-stack2"></i> <span>My listings</span></a>
                        <ul>
                            <li><a href="{{ route("accomodation.index") }}" style="{{ (Request::is( 'accomodation', 'accomodation/*/edit') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Listings Panel</a></li>
                            <li><a href="{{ route('accomodation.create') }}" style="{{ (Request::is( 'accomodation/create') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Add New Listing</a></li>
                        </ul>
                    </li>

                    @endif

                    @if(isset($user) && $user->role[0]->name == 'admin')
                    <li>
                        <a href="javascript:void;"><i class="icon-copy"></i> <span>Partner List</span></a>
                        <ul>
                            <li><a href="{{ route("partnerlist.index") }}" id="layout1">All Partner List</a></li>
                            <!--<li><a href="javascript:void;" id="layout1">View Pending Partner</a></li>-->
                        </ul>
                    </li>

                    <li class="{{ Request::is( 'accommlist', 'accommlist/*', 'amenitylist', 'amenitylist/*', 'activitylist', 'activitylist/*', 'roomlist', 'roomlist/*', 'paymentmodelist', 'paymentmodelist/*', 'surroundinglist', 'surroundinglist/*') ? 'active' : '' }}">
                        <a href="javascript:void;"><i class="icon-copy"></i> <span>Data Management</span></a>
                        <ul>
                            <li><a href="{{ route("accommlist.index") }}" style="{{ Request::is( 'accommlist', 'accommlist/*') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout1">Accommodation List</a></li>
                            <li><a href="{{ route("amenitylist.index") }}" style="{{ Request::is( 'amenitylist', 'amenitylist/*') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout1">Amenity on Property</a></li>
                            <li><a href="{{ route("activitylist.index") }}" style="{{ Request::is( 'activitylist', 'activitylist/*') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Activity on property</a></li>
                            <li><a href="{{ route("roomlist.index") }}" style="{{ Request::is( 'roomlist', '/roomlist*') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Room Type List</a></li>
                            <li><a href="{{ route("paymentmodelist.index") }}" style="{{ Request::is( 'paymentmodelist', 'paymentmodelist/*') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Payment Mode List</a></li>
                            <li><a href="{{ route("surroundinglist.index") }}" style="{{ Request::is( 'surroundinglist', 'surroundinglist/*') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Activities in Surroundings</a></li>
                        </ul>
                    </li>

                    <li class="{{ Request::is( 'packagelist', 'packagelist/*') ? 'active' : '' }}">
                        <a href="javascript:void;"><i class="icon-copy"></i> <span>Package Management</span></a>
                        <ul>
                            <li><a href="{{ route("packagelist.index") }}" style="{{ Request::is( 'packagelist', 'packagelist/*') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout1">Package List</a></li>
                        </ul>
                    </li>
                    @endif

                    <!-- /main -->

                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>