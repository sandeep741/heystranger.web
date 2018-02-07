@extends('app')
@section('content')

<div class="global-wrap container-fluid">
    <div class="row">
        <div class="container-fluid">

            <div class="vc_row wpb_row st bg-holder vc_custom_1427261023966 vc_row-has-fill bg-parallax">
                <div class="bg-mask"></div>
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

            <div class="row">

                <div class="container">
                    <h1 class="page-title text-center mt60">Register as a Partner Step 2</h1>
                </div>

                <div class="container">
                    
                    @if(count(Session::get('pkg_data')) > 0 && Session::get('pkg_data')->package_type == 'P')
                    
                    <?php
                    $pkg_price = Session::get('pkg_data')->price;
                    $pkg_vat = Session::get('pkg_data')->vat;
                    $vat_amt = ($pkg_vat/100)*$pkg_price;
                    $total = $vat_amt + $pkg_price;
                    
                    ?>
                    <div class="row">
                        <div class='col-md-12'>

                            <!--<div class='col-md-6'>    
                                <table class='table table-striped table-hover table-bordered'>
                                    <tr>
                                        <td colspan='2' style='text-align:center'><h4>Selected Detail</h4></td>

                                    </tr>
                                    <tr>
                                        <td><b>Accomodation :- </b></td><td>fsadfd</td>
                                    </tr>
                                    <tr>
                                        <td><b>Venue & Conference :-</b></td><td>dsfsdf</td>
                                    </tr>
                                    <tr>
                                        <td><b>Transport:- </b></td><td>dsffffff</td>
                                    </tr>
                                    <tr>
                                        <td><b>additional_service:- </b></td><td>dss</td>
                                    </tr>
                                </table>
                            </div>-->


                            <table class='table table-striped table-hover table-bordered'>
                                <tr>
                                    <td colspan='2' style='text-align:center'><h4>Price Summary</h4></td>

                                </tr>
                                <tr>
                                    <td><b>Package Name :- </b></td><td>{{ (!empty(Session::get('pkg_data'))) ? Session::get('pkg_data')->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Accomodation :- </b></td><td>{{ (!empty(Session::get('accommo_no'))) ? Session::get('accommo_no') : '' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Venue & Conference :-</b></td><td>{{ (!empty(Session::get('venu_conf')) && Session::get('venu_conf') == 'Y' ? 'Yes' : 'No') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Transport:- </b></td><td>{{ (!empty(Session::get('transport')) && Session::get('transport') == 'Y' ? 'Yes' : 'No') }}</td>
                                </tr>
                                <tr>
                                    <td><b>additional_service:- </b></td><td>{{ (!empty(Session::get('additional')) && Session::get('additional') == 'Y' ? 'Yes' : 'No') }}</td>
                                </tr>


                                <tr>
                                    <td><b>Total:- </b></td><td>{{ (isset($pkg_price) && !empty($pkg_price)) ? config('constants.currency').' '.$pkg_price : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Vat:- </b></td><td>{{ (isset($pkg_vat) && !empty($pkg_vat)) ? $pkg_vat.'%' : 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td><b>Final Amount:- </b></td><td>{{ (isset($total) && !empty($total)) ? config('constants.currency').' '.$total : '' }}</td>
                                </tr>
                            </table>


                        </div>
                    </div>
                    @endif

                    {!!
                            Form::open(
                            array(
                            'name' => 'frm_package',
                            'id' => 'frm_package',
                            'url' => 'register-step3',
                            'autocomplete' => 'off',
                            'class' => 'register_form',
                            'files' => false,
                            'method' => 'post'
                            )
                            )
                            !!}
                        <div class="row">

                            <div class="col-md-6 col-md">

                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">First Name<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-user input-icon input-icon-show"></i>
                                    {!! Form::text('first_name', null, ['class' => 'form-control', 'placeholder' => 'Enter First Name *']) !!}
                                    
                                    @if ($errors->has('first_name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Sur Name<span class="color-red"></span></label>
                                    <i class="fa fa-user input-icon input-icon-show"></i>
                                    {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder' => 'Enter Sur Name *']) !!}
                                    
                                    @if ($errors->has('last_name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Landline No.<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-mobile input-icon input-icon-show"></i>
                                    {!! Form::text('landline', null, ['class' => 'form-control', 'placeholder' => 'Enter landline']) !!}
                                    
                                    @if ($errors->has('landline'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('landline') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Mobile No.<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-mobile input-icon input-icon-show"></i>
                                    {!! Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => 'Enter mobile *']) !!}
                                    
                                    @if ($errors->has('mobile'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Country<span class="color-red"> (*)</span></label>
                                    <?php
                                    
                                        $all_country = App\Helpers\Helper::getAllCountry();
                                        if(isset($all_country) && !empty($all_country)){
                                            $arr_country = $all_country;
                                            
                                        } else {
                                            $arr_country = [];
                                        }
                                    ?>
                                    
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    {{Form::select('country',[''=>'Select Country *']+$arr_country->pluck('name','id')->toArray(), null,['id'=> 'state_id', 'class'=>'form-control country_id'])}}
                                    
                                    @if ($errors->has('country'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Suburb / Area<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    {{Form::select('state',[''=>'Select State *'], (isset($edit_data) && !empty($edit_data) ? @$edit_data->state_id : ''),['id'=> 'state_id', 'class'=>'form-control state_id'])}}

                                    @if ($errors->has('state'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">City / Town<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    {{Form::select('city',[''=>'Select city *'], (isset($edit_data) && !empty($edit_data) ? @$edit_data->city_id : ''),['id'=> 'address_city_id', 'class'=>'form-control address_city_id'])}}

                                    @if ($errors->has('city'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Address</label>
                                    {!! Form::textarea('address', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Please enter address']) !!}
                                    @if ($errors->has('address'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>


                            <div class="col-md-6 col-md">

                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Email.<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Enter Email']) !!}
                                    @if ($errors->has('email'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-user_name">User Name<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-user input-icon input-icon-show"></i>
                                    {!! Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'Enter Username']) !!}
                                    @if ($errors->has('user'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('user') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-password">Password<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-lock input-icon input-icon-show"></i>
                                    {!! Form::password('password', ['class' => 'form-control', 'id' => 'passwords', 'placeholder' => 'Enter Password *']) !!}
                                    @if ($errors->has('password'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-password">Confirm Password<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-lock input-icon input-icon-show"></i>
                                    {!! Form::password('confirm_password', ['class' => 'form-control password', 'placeholder' => 'Enter Confirm Password *']) !!}
                                    @if ($errors->has('confirm_password'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt20">
                            {{ Form::input('hidden', 'temp_last_id', (!empty(Session::get('temp_id')) ? Session::get('temp_id') : ''), ['readonly' => 'readonly']) }}

                            <input  class="btn btn-primary btn-lg" type="submit" name='full_detail' value='Submit' />
                        </div>
                    {!! Form::close() !!}
                    <br>

                </div>

            </div>
        </div>

    </div>
</div>
</div>
<!-- end row -->
</div>
</div>
</div>
</div>
<!-- end row -->
</div>
@endsection

@section('pageTitle')
Final Registration
@endsection

@section('addtional_css')
@endsection

@section('jscript')
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/city.js')}}"></script>
@endsection