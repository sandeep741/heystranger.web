<div class="page-header">
    <div class="page-header-content">
        <div class="page-title">
            <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">@yield('pageTitle')</span></h4>
        </div>
        <!--<div class="heading-elements">
            <div class="heading-btn-group">
                <a href="add-accommo.php" class="btn btn-success"><i class="icon-comment-discussion position-left"></i> Add New</a>

            </div>
        </div>-->
    </div>
    <div class="breadcrumb-line">
        <!--<ul class="breadcrumb">
            <li><a href="{{ route('admin.login') }}"><i class="icon-home2 position-left"></i> Home</a></li>
            <li class="active">@yield('pageTitle')</li>
        </ul>-->
        {!! Breadcrumbs::render() !!}
        <!--<ul class="breadcrumb-elements">
            <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-gear position-left"></i>
                    Settings
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                    <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                    <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                </ul>
            </li>
        </ul>-->
    </div>
</div>

<div class="col-md-9 col-md-offset-2">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has($msg))

    <div class="alert bg-{{ $msg }} alert-styled-right" >
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">{{ Session::get($msg) }}</span>
    </div>
    @endif
    @endforeach
</div>