@extends('app')
@section('content')
<div class="global-wrap container-fluid">
    <div class="row">
        <div class="container-fluid">

            <div class="vc_row wpb_row st bg-holder vc_custom_1427261023966 vc_row-has-fill bg-parallax">
                <div class="bg-mask"></div>
                <div class='container '>
                    <div class='row'>
                        <div class="wpb_column column_container col-md-12">
                            <div class="vc_column-inner wpb_wrapper">
                                <div class="text-center text-white">
                                    <h2 class="text-uc mb20">Register with Hey Stranger</h2>
                                    <ul class="icon-list list-inline-block mb0 last-minute-rating">
                                        <li><i class="fa  fa-star"></i></li>
                                        <li><i class="fa  fa-star-o"></i></li>
                                        <li><i class="fa  fa-star-o"></i></li>
                                        <li><i class="fa  fa-star-o"></i></li>
                                        <li><i class="fa  fa-star-o"></i></li>
                                    </ul>
                                    <h5 class="last-minute-title">List your property and maximize online bookings </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End .row-->
                </div>
                <!--End .container-->
            </div>

            <div class="row">
                <div class="container">
                    <div class="row" data-gutter="60">

                        <div class="col-md-6">

                            <h1 class="page-title text-center mt60">Become a Partner</h1>

                            {!!
                            Form::open(
                            array(
                            'name' => 'partner_register',
                            'id' => 'partner_register',
                            'url' => 'register',
                            'autocomplete' => 'off',
                            'class' => 'form-horizontal',
                            'files' => false
                            )
                            )
                            !!}
                            <?php
                            $all_country = App\Helpers\Helper::getAllCountry();
                            if (isset($all_country) && !empty($all_country)) {
                                $arr_country = $all_country;
                            } else {
                                $arr_country = [];
                            }
                            ?>
                            
                            <div class="row mt20 data_field">
                                <div class="col-md-12">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-name">Name & Surname<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'e.g. John Doe *']) !!}
                                        @if ($errors->has('name'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row mt20 data_field">
                                <div class="col-md-12">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-email">Your Email Id<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {!! Form::text('email_id', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com *']) !!}
                                        @if ($errors->has('email_id'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('email_id') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>

                            </div>

                            <div class="row mt20 data_field">
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-email">Select Country<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                                        {{Form::select('country_id',[''=>'Select Country *']+@$all_country->pluck('name','id')->toArray(), null,['id'=> 'country_id', 'class'=>'form-control country_id'])}}

                                        @if ($errors->has('country_id'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('country_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-full_name">Select State</label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {{Form::select('state_id',[''=>'Select State *'], null,['id'=> 'state_id', 'class'=>'form-control state_id'])}}

                                        @if ($errors->has('state_id'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('state_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mt20 data_field">
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-email">Select City<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                                        {{Form::select('city_id',[''=>'Select city *'], null,['id'=> 'address_city_id', 'class'=>'form-control address_city_id'])}}

                                        @if ($errors->has('city_id'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('city_id') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-full_name">Enter Suburb Area</label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {!! Form::text('suburb_area', null, ['class' => 'form-control', 'placeholder' => 'Ex: Suburb Area']) !!}
                                        @if ($errors->has('suburb_area'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('suburb_area') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-full_name">Enter Contact No</label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {!! Form::text('contact_no', null, ['class' => 'form-control', 'placeholder' => 'Ex: (+27) 00 000 0000']) !!}
                                        @if ($errors->has('contact_no'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('contact_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-full_name">Enter Alternative No</label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {!! Form::text('alternate_no', null, ['class' => 'form-control', 'placeholder' => 'Ex: (+27) 00 000 0000']) !!}
                                        @if ($errors->has('alternate_no'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('alternate_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row mt20 data_field">
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-email">Create Your Password<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-envelope input-icon input-icon-show"></i>
                                        {!! Form::password('password', ['class' => 'form-control', 'id' => 'passwords', 'placeholder' => 'Enter Password *']) !!}
                                        @if ($errors->has('password'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-full_name">Repeat Password</label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {!! Form::password('password_confirmation', ['class' => 'form-control password', 'placeholder' => 'Re-Enter Password *']) !!}
                                        @if ($errors->has('password_confirmation'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!--<div class="checkbox st_check_term_conditions mt20">
                                <label>
                                    <input class="i-check term_condition" name="term_condition" type="checkbox" />I have read and accept the<a target="_blank" href="#"> terms and conditions</a>        </label>
                            </div>-->
                            <div class="text-center mt20">
                                <input name="btn_reg" class="btn btn-primary btn-lg" type="hidden" value="register">
                                <button class="btn btn-primary btn-lg" type="submit">Get Started</button>
                            </div>
                            {!! Form::close() !!}

                        </div>

                        {!!
                        Form::open(
                        array(
                        'name' => 'frmLogin',
                        'id' => 'validate-form',
                        'route' => 'admin.login',
                        'autocomplete' => 'off',
                        'class' => 'form-horizontal'
                        )
                        )
                        !!}
                        <div class="col-md-6">

                            <h1 class="page-title text-center mt60">Sign In </h1>

                            <div class="row mt20 data_field">
                                <div class="col-md-12">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-user_name">Your Login Name<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {{ Form::text('email', '', ['class' => 'form-control login', 'placeholder' => 'Enter your email *']) }}
                                @if ($errors->has('email'))
                                <span class="help-block" style = "display:block;color:red;">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row mt20 data_field">
                                <div class="col-md-12">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-user_name">Enter Password<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {{ Form::password('password', ['class' => 'form-control password', 'id' => 'password', 'placeholder' => 'Enter password *']) }}
                                @if ($errors->has('password'))
                                <span class="help-block" style = "display:block;color:red;">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                                    </div>
                                </div>

                            </div>

                            <div class="mt20">
                                <input name="btn_reg" class="btn btn-primary btn-lg" type="hidden" value="register">
                                <button class="btn btn-primary btn-lg" type="submit" >Get Started</button>
                            </div>

                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
                <div class="gap">

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection

@section('pageTitle')
Welcome to Hey Stranger
@endsection

@section('addtional_css')
@endsection

@section('jscript')

<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/city.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/jquery.validate.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/additional-methods.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/client-validation.js')}}"></script>

@endsection