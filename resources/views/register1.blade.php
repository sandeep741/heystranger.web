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

                        <div class="col-md-3">
                            <h1 class="page-title text-center mt60">Add Area</h1>
                        </div>

                        <div class="col-md-9">

                            {!!
                            Form::open(
                            array(
                            'name' => 'partner_register1',
                            'id' => 'partner_register1',
                            'url' => 'register1',
                            'autocomplete' => 'off',
                            'class' => 'form-horizontal',
                            'files' => false
                            )
                            )
                            !!}
                            <?php
                            $property = [];
                            for ($i = 1; $i <= 50; $i++) {
                                $property[$i] = $i;
                            }
                            ?>

                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                            @if(Session::has($msg))

                            <div class="alert bg-{{ $msg }} alert-styled-right" >
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">{{ Session::get($msg) }}</span>
                            </div>
                            @endif
                            @endforeach

                            <h4 class="mt60">Accommodation / Venue / Conference </h4>
                            <p>Number of properties (at different locations)</p>

                            <div class="row mt20 data_field">
                                <div class="col-md-12">
                                    <div class="form-group  form-group-icon-left">
                                        {{Form::select('prop_no',[''=>'Enter no. of properties *']+$property, null,['id'=> 'prop_no', 'class'=>'form-control'])}}

                                        @if ($errors->has('prop_no'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('prop_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="row mt20 data_field">
                                <h4>Packages Available </h4>
                                <p>Launch Promotion - (R 595.00 Exl. VAT per Listing) Annual - 50% Discount “Limited Spaces Available”</p>
                                <p>Per Year - R 1200.00 Exl VAT per Listing (Deal directly with clients) Normal Price</p>
                                <p>15% Commission - (R350.00 Once off Registration Fee Exl.VAT) “On First Registration Only” (T&C Apply)</p>

                            </div>


                            <div class="checkbox st_check_term_conditions mt20">
                                <label>
                                    {{ Form::checkbox('term_condition', 1, null, ['class' => 'i-check term_condition']) }}
                                    <span>Note: There are a short time period on Pending listings. Spaces are limited. Activate within 10 working days. (T & C Apply)</span>

                                    I have read and accept the<a target="_blank" href="#"> terms and conditions of Hey Stranger PTY Ltd</a>        </label>
                                @if ($errors->has('term_condition'))
                                <span class="help-block" style = "display:block;color:red;">
                                    <strong>{{ $errors->first('term_condition') }}</strong>
                                </span>
                                @endif
                            </div>



                            <div class="mt20">
                                <button class="btn btn-primary btn-lg" type="submit" >Submit</button>
                            </div>
                            {!! Form::close() !!}

                        </div>
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