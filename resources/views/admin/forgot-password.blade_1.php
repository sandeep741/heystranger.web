<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <!-- Global stylesheets -->
        <link href="{{ asset('/assets/css/Roboto-family.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('/assets/admin/css/styles.css') }}" rel="stylesheet" type="text/css" media="all"/> 
        <link href="{{ asset('/assets/admin/css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all"/> 
        <link href="{{ asset('/assets/admin/css/core.css') }}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('/assets/admin/css/components.css') }}" rel="stylesheet" type="text/css" media="all"/>
        <link href="{{ asset('/assets/admin/css/colors.css') }}" rel="stylesheet" type="text/css" media="all"/>
        <link rel="icon"  type="image/png"  href="{{ asset('/assets/images/favicon.png') }}">
        <!-- /global stylesheets -->
    </head>

    <body>

        <!-- Main navbar -->
        <div class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><img src="{{ asset('/assets/admin/images/logo_light.png') }}" alt=""></a>

                <ul class="nav navbar-nav pull-right visible-xs-block">
                    <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
                </ul>
            </div>

            <div class="navbar-collapse collapse" id="navbar-mobile">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <i class="icon-display4"></i> <span class="visible-xs-inline-block position-right"> Go to website</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class="icon-user-tie"></i> <span class="visible-xs-inline-block position-right"> Contact admin</span>
                        </a>
                    </li>

                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown">
                            <i class="icon-cog3"></i>
                            <span class="visible-xs-inline-block position-right"> Options</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navbar -->


        <!-- Page container -->
        <div class="page-container login-container">

            <!-- Page content -->
            <div class="page-content">

                <!-- Main content -->
                <div class="content-wrapper">

                    <!-- Content area -->
                    <div class="content">

                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif

                        <!-- Password recovery -->
                        {!!
                        Form::open(
                        array(
                        'name' => 'frm_forgot_password',
                        'id' => 'frm_forgot_password',
                        'url' => '/password/email',
                        'autocomplete' => 'off',
                        'class' => 'form-horizontal frm_forgot_password'
                        )
                        )
                        !!}
                        <div class="panel panel-body login-form">
                            <div class="text-center">
                                <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
                                <h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
                            </div>

                            <div class="form-group has-feedback">
                                {{ Form::text('email', '', ['class' => 'form-control login', 'placeholder' => 'enter your email *']) }}

                                @if ($errors->has('email'))
                                <span class="help-block" style = "display:block;color:red;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                                <div class="form-control-feedback">
                                    <i class="icon-mail5 text-muted"></i>
                                </div>
                            </div>

                            <button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
                        </div>
                        {!! Form::close()!!}
                        <!-- /password recovery -->


                        <!-- Footer -->
                        @include('admin.layouts.footer')
                        <!-- /footer -->

                    </div>
                    <!-- /content area -->

                </div>
                <!-- /main content -->

            </div>
            <!-- /page content -->

        </div>
        <!-- /page container -->

    </body>
</html>
