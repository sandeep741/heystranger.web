<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('admin.login') }}"><img src="{{ asset('/assets/admin/images/logo_light.png') }}" alt=""></a>
        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
            <li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
        </ul>
    </div>
    <div class="navbar-collapse collapse" id="navbar-mobile">
        <ul class="nav navbar-nav">
            <li>
                <a class="sidebar-control sidebar-main-toggle hidden-xs">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-git-compare"></i>
                    <span class="visible-xs-inline-block position-right">Git updates</span>
                    <span class="badge bg-warning-400">9</span>
                </a>
                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-heading">
                        Notifications
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-sync"></i></a></li>
                        </ul>
                    </div>
                    <ul class="media-list dropdown-content-body width-350">
                        <li class="media">
                            <div class="media-left">
                                <a href="#" class="btn border-primary text-primary btn-flat btn-rounded btn-icon btn-sm"><i class="icon-git-pull-request"></i></a>
                            </div>
                            <div class="media-body">
                                Your hotel Booked
                                <div class="media-annotation">4 minutes ago</div>
                            </div>
                        </li>
                    </ul>

                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All Notifications"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-bubbles4"></i>
                    <span class="visible-xs-inline-block position-right">Admin Notifications</span>
                    <span class="badge bg-warning-400">2</span>
                </a>
                <div class="dropdown-menu dropdown-content width-350">
                    <div class="dropdown-content-heading">
                        Admin Notifications
                        <ul class="icons-list">
                            <li><a href="#"><i class="icon-compose"></i></a></li>
                        </ul>
                    </div>
                    <ul class="media-list dropdown-content-body">
                        <li class="media">
                            <div class="media-left">
                                <img src="{{ asset('/assets/admin/images/face10.jpg') }}" class="img-circle img-sm" alt="">
                                <span class="badge bg-danger-400 media-badge">5</span>
                            </div>
                            <div class="media-body">
                                <a href="#" class="media-heading">
                                    <span class="text-semibold">James Alexander</span>
                                    <span class="media-annotation pull-right">04:58</span>
                                </a>
                                <span class="text-muted">who knows, maybe that would be the best thing for me...</span>
                            </div>
                        </li>

                    </ul>
                    <div class="dropdown-content-footer">
                        <a href="#" data-popup="tooltip" title="All Notifications"><i class="icon-menu display-block"></i></a>
                    </div>
                </div>
            </li>
            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('/assets/admin/images/face11.jpg') }}" alt="">
                    <span>{{ ($user ? $user->name : '') }}</span>
                    <i class="caret"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="member-profile.html"><i class="icon-user-plus"></i> My profile</a></li>
                    <li><a href="my-accommodation.html"><i class="icon-coins"></i> My Accommodation</a></li>
                    <li><a href="hotel-booked.html"><span class="badge badge-warning pull-right">58</span> <i class="icon-comment-discussion"></i> Hotel Booked</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li>
                    
                    
                    <li>
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                           <i class="icon-switch2"></i> Logout</a>
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                    
                    
                </ul>
            </li>
        </ul>
    </div>
</div>