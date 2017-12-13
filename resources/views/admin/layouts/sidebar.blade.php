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
                    <li><a href="{{ route('admin.login') }}"><i class="icon-home4"></i> <span>Dashboard</span></a></li>

                    @if(isset($user) && $user->role[0]->name == 'partner')
                    <li>
                        <a href="javascript:void;"><i class="icon-stack2"></i> <span>My Accommodation</span></a>
                        <ul>
                            <li><a href="{{ action("Partner\AccommodationController@index") }}">My Accommodation</a></li>
                            <li><a href="{{ action("Partner\AccommodationController@create") }}">Add Accommodation</a></li>
                            <li><a href="javascript:void;">Add Room</a></li>

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

                    <?php
                    switch (\Request::route()->getName()) {
                        case 'accommlist.index':
                            $active = 'active';
                            break;
                        case 'amenitylist.index':
                            $active = 'active';
                            break;
                        case 'activitylist.index':
                            $active = 'active';
                            break;
                        case 'roomlist.index':
                            $active = 'active';
                            break;
                        case 'paymentmodelist.index':
                            $active = 'active';
                            break;
                        case 'surroundinglist.index':
                            $active = 'active';
                            break;
                        default:
                            $active = '';
                    }
                    ?>

                    <li class="{{ $active }}">
                        <a href="javascript:void;"><i class="icon-copy"></i> <span>Data Management</span></a>
                        <ul style="{{ ((\Request::route()->getName() == 'amenitylist.index') ? 'display:block' : '') }}">
                            <li><a href="{{ action("Admin\AccommListController@index") }}" style="{{ (\Request::route()->getName() == 'accommlist.index') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout1">Accommodation List</a></li>
                            <li><a href="{{ action("Admin\AmenityListController@index") }}" style="{{ (\Request::route()->getName() == 'amenitylist.index') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout1">Amenity List</a></li>
                            <li><a href="{{ action("Admin\ActivityListController@index") }}" style="{{ (\Request::route()->getName() == 'activitylist.index') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Activity List</a></li>
                            <li><a href="{{ action("Admin\RoomListController@index") }}" style="{{ (\Request::route()->getName() == 'roomlist.index') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Room Type List</a></li>
                            <li><a href="{{ action("Admin\PaymentModeListController@index") }}" style="{{ (\Request::route()->getName() == 'paymentmodelist.index') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Payment Mode List</a></li>
                            <li><a href="{{ action("Admin\SurroundingListController@index") }}" style="{{ (\Request::route()->getName() == 'surroundinglist.index') ? 'background-color:rgba(0,0,0,.1); color:#fff' : '' }}" id="layout2">Surrounding List</a></li>
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