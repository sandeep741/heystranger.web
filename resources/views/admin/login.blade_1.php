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

    <body class="login-cover">
        <!-- Page container -->
        <div class="page-container login-container">
            <!-- Page content -->
            <div class="page-content">
                <!-- Main content -->
                <div class="content-wrapper">
                    <!-- Content area -->
                    <div class="content">
                        
                            {!!
                            Form::open(
                            array(
                            'name' => 'frmLogin',
                            'id' => 'validate-form',
                            'url' => '/login',
                            'autocomplete' => 'off',
                            'class' => 'form-horizontal'
                            )
                            )
                            !!}
                            <div class="panel panel-body login-form">
                                <div class="text-center">
                                    <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i></div>
                                    <h5 class="content-group">Login to your account <small class="display-block">Your credentials</small></h5>

                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    {{ Form::text('login', '', ['class' => 'form-control login', 'placeholder' => 'enter your email *']) }}
                                    @if ($errors->has('login'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                                    <div class="form-control-feedback">
                                        <i class="icon-user text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group has-feedback has-feedback-left">
                                    {{ Form::password('password', ['class' => 'form-control password', 'id' => 'password', 'placeholder' => 'enter password...']) }}
                                    @if ($errors->has('password'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                    <div class="form-control-feedback">
                                        <i class="icon-lock2 text-muted"></i>
                                    </div>
                                </div>

                                <div class="form-group login-options">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <!--<label class="checkbox-inline">
                                                {{ Form::checkbox('remeber', 1, null, ['class' => 'styled']) }}
                                                <span> Remember</span>

                                            </label>-->
                                        </div>

                                        <div class="col-sm-6 text-right">
                                            <a href="{{ route('forgot_password') }}">Forgot password?</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::submit("Login", ['class' => "btn bg-blue btn-block", 'id' => "login"]) !!}
                                </div>


                            </div>
                            {!! Form::close()!!}
                            <!-- /form with validation -->

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
