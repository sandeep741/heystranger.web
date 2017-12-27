<?php
$active = App\Helpers\Helper::getParentRouteName();
if (isset($active) && !empty($active)) {
    $current = $active['active'];
    $parent_route = $active['parent'];
}
?>
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
                    <li class="{{ ($parent_route == 'partner' ? 'active' : '') }}"><a href="{{ route('admin.login') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    @if(isset($user) && $user->role[0]->name == 'partner')
                    <li class="{{ ($parent_route == 'accomodation' ? 'active' : '') }}">
                        <a href="javascript:void;"><i class="icon-stack2"></i> <span>My Accommodation</span></a>
                        <ul style="{{ (($parent_route == 'accomodation') ? 'display:block' : '') }}">
                            <li><a href="{{ route("accomodation.index") }}" style="{{ ( ( Request::segment(1) == 'accomodation' && empty(Request::segment(2)) ) ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Accommodation Listing</a></li>
                            <li><a href="{{ route('accomodation.create') }}" style="{{ ( (Request::segment(2) == 'create') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Add Accommodation</a></li>
                        </ul>
                    </li>

                    <li class="{{ ( ($parent_route == 'add-venue-conference' || $parent_route == 'venue-conference-list' || Request::segment(1) == 'edit-venue-conference')  ? 'active' : '') }}">
                        <a href="javascript:void;"><i class="icon-stack2"></i> <span>My Venue & Conference</span></a>
                        <ul style="{{ ( Request::segment(1) == 'edit-venue-conference' ? 'display:block' : '') }}">
                            <li><a href="{{ route("venue_confer_list") }}" style="{{ ( (Request::segment(1) == 'venue-conference-list') || (Request::segment(1) == 'edit-venue-conference') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Venue & Conference Listing</a></li>
                            <li><a href="{{ route('add_venue_confer') }}" style="{{ ( (Request::segment(1) == 'add-venue-conference') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Add Venue & Conference</a></li>
                        </ul>
                    </li>

                    <li class="{{ ($parent_route == 'promo' ? 'active' : '') }}">
                        <a href="javascript:void;"><i class="icon-stack2"></i> <span>My Promotion</span></a>
                        <ul style="{{ (($parent_route == 'promo') ? 'display:block' : '') }}">
                            <li><a href="{{ route("accomodation.index") }}" style="{{ ( ( Request::segment(1) == 'promo' && empty(Request::segment(2)) ) ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Promotion Listing</a></li>
                            <li><a href="{{ route('accomodation.create') }}" style="{{ ( (Request::segment(2) == 'create') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '') }}">Add Promotion</a></li>
                        </ul>
                    </li>

                    @endif

                    @if(isset($user) && $user->role[0]->name == 'admin')
                    <li>
                        <a href="javascript:void;"><i class="icon-copy"></i> <span>Partner List</span></a>
                        <ul>
                            <li><a href="javascript:void;" id="layout1">All Partner List</a></li>
                            <li><a href="javascript:void;" id="layout1">View Pending Partner</a></li>
                        </ul>
                    </li>

                    <li class="{{ $current }}">
                        <a href="javascript:void;"><i class="icon-copy"></i> <span>Data Management</span></a>
                        <ul style="{{ (($parent_route == 'amenitylist') ? 'display:block' : '') }}">
                            <li><a href="{{ route("accommlist.index") }}" style="{{ ($parent_route == 'accommlist') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout1">Accommodation List</a></li>
                            <li><a href="{{ route("amenitylist.index") }}" style="{{ ($parent_route == 'amenitylist') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout1">Amenity on Property</a></li>
                            <li><a href="{{ route("activitylist.index") }}" style="{{ ($parent_route == 'activitylist') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Activity on property</a></li>
                            <li><a href="{{ route("roomlist.index") }}" style="{{ ($parent_route == 'roomlist') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Room Type List</a></li>
                            <li><a href="{{ route("paymentmodelist.index") }}" style="{{ ($parent_route == 'paymentmodelist') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Payment Mode List</a></li>
                            <li><a href="{{ route("surroundinglist.index") }}" style="{{ ($parent_route == 'surroundinglist') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Activities in Surroundings</a></li>
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