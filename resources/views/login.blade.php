@extends('app')
@section('content')

<div class="global-wrap container-fluid">
    <div class="row st-full">
        <div class="full-page  ">
            <div class="bg-holder full">
                <div class="bg-mask"></div>
                <div class="bg-img st_1487264160"></div>
                <div class="bg-blur "></div>
                <div class="bg-holder-content full text-white">
                    <a class="logo-holder" href="#">
                        <img src="{{ asset('/assets/images/logo-white.png') }}" alt="logo" title="Traveler">
                    </a>
                    <div class="login">
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

                                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                                @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="password" class="col-md-4 control-label">Password</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control" name="password" required>

                                                @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-8 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Login
                                                </button>

                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    Forgot Your Password?
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-4">
                                    <h3 class="pb30 mb0">Welcome To Traveler ?</h3>
                                    <div class="mt5"><b><a class="btn-lg btn btn-primary" href="register.php">Register New</a></b></div>
                                    <div class="mt15">


                                        <div class="wp-social-login-widget">
                                            <div class="wp-social-login-connect-with">Or register as:</div>
                                            <div class="wp-social-login-provider-list">
                                                <a rel="nofollow" href="#" title="Connect with Facebook" class="wp-social-login-provider wp-social-login-provider-facebook" data-provider="Facebook">
                                                    <img alt="Facebook" title="Connect with Facebook" src="http://z8e0944c0fq469vst36jkhqn.wpengine.netdna-cdn.com/wp-content/plugins/wordpress-social-login/assets/img/32x32/wpzoom/facebook.png">
                                                </a>
                                                <a rel="nofollow" href="#" title="Connect with Google" class="wp-social-login-provider wp-social-login-provider-google" data-provider="Google">
                                                    <img alt="Google" title="Connect with Google" src="http://z8e0944c0fq469vst36jkhqn.wpengine.netdna-cdn.com/wp-content/plugins/wordpress-social-login/assets/img/32x32/wpzoom/google.png">
                                                </a>
                                                <a rel="nofollow" href="#" title="Connect with Twitter" class="wp-social-login-provider wp-social-login-provider-twitter" data-provider="Twitter">
                                                    <img alt="Twitter" title="Connect with Twitter" src="http://z8e0944c0fq469vst36jkhqn.wpengine.netdna-cdn.com/wp-content/plugins/wordpress-social-login/assets/img/32x32/wpzoom/twitter.png">
                                                </a>
                                            </div>
                                            <div class="wp-social-login-widget-clearing"></div>
                                        </div>
                                        <!-- wsl_render_auth_widget -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('pageTitle')
Login
@endsection

@section('addtional_css')
@endsection

@section('jscript')
@endsection
