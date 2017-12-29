<!DOCTYPE html>
<html lang="en-US" class="full">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome to Hey Stranger</title>
        <link rel='stylesheet' href='{{ asset('/assets/css/bootstrap.css') }}' type='text/css' media='all' />
        <link rel='stylesheet' href='{{ asset('/assets/css/styles2.css') }}' type='text/css' media='all' />
        <link rel='stylesheet' href='{{ asset('/assets/css/custom.css') }}' type='text/css' media='all' />
    </head>

    <body class="full">
        <div class="global-wrap container-fluid" style="height: 100%">
            <div class="row st-full">
                <div class="full-page  ">
                    <div class="bg-holder full">
                        <div class="bg-mask"></div>
                        <div class="bg-img st_1514468432"></div>
                        <div class="bg-blur" style="width:0% !important"></div>
                        <div class="bg-holder-content full text-white">
                            <a class="logo-holder" href="{{ route('home') }}">
                                <img src="{{ asset('assets/images/logo-white.png') }}" alt="logo">
                            </a>

                            <div class="login full-center">
                                <div class="container">
                                    <div class="row row-wrap" data-gutter="60">
                                        <div class="col-md-4">
                                            <div class="visible-lg visible-md">
                                                <h3 class="mb15">Page : Login Full</h3>
                                                <p>Est nisl facilisis consectetur eget fermentum rutrum suscipit penatibus ultrices eu bibendum mi volutpat mattis cum facilisis nunc platea tincidunt vehicula laoreet montes parturient urna magnis eu etiam eget integer</p>
                                                <p>Nullam consectetur fames erat scelerisque ac conubia orci mauris facilisi</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <h3>Login</h3>

                                            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                                
                                                {{ csrf_field() }}
                                                
                                                <div class="form-group form-group-ghost form-group-icon-left">
                                                    <label for="field-login_name">User Name</label>
                                                    <i class="fa fa-user input-icon input-icon-show"></i>
                                                    <input id="field-login_name" type="email" class="form-control" name="email" placeholder="e.g. johndoe" value="{{ old('email') }}" required autofocus>
                                                    @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                                </div>

                                                <div class="form-group form-group-ghost form-group-icon-left">
                                                    <label for="field-login_password">Password</label>
                                                    <i class="fa fa-lock input-icon input-icon-show"></i>
                                                    <input id="password" type="password" class="form-control" name="password"  placeholder="my secret password"required>
                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                                </div>

                                                <div class="form-group form-group-ghost form-group-icon-left">
                                                <input class="btn btn-primary" name="dlf_submit" type="submit" value="Sign In" />
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="col-md-4">
                                            <h3 class="pb30 mb0">New To Hey Stranger!! Register with Hey Stranger</h3>
                                            <div class="mt5"><b><a class="btn-lg btn btn-primary" href="#">Register New</a></b></div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>

            .st_1514468432{

                background: url({{ asset('assets/images/lhotel_porto_bay_sao_paulo_luxury_suite_800x600.jpg') }} )

            }
        </style>
    </body>
</html>
