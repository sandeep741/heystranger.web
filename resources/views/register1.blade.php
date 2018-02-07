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

                            <h4 class="mt60">Accommodation / Venue / Conference </h4>
                            <p>Number of properties (at different locations)</p>

                            <div class="row mt20 data_field">
                                <div class="col-md-12">
                                    <div class="form-group  form-group-icon-left">

                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        <input id="field-user_name" name="user_name" class="form-control" placeholder="1" type="text" value="" />
                                    </div>
                                </div>

                            </div>

                            <div class="row mt20 data_field">
                                <h4>Packages Available </h4>
                                <p>Launch Promotion - (R 595.00 Exl. VAT per Listing) Annual - 50% Discount “Limited Spaces Available”</p>
                                <p>Per Year - R 1200.00 Exl VAT per Listing (Deal directly with clients) Normal Price</p>
                                <p>15% Commission - (R350.00 Once off Registration Fee Exl.VAT) “On First Registration Only” (T&C Apply)</p>

                                <h4>Congratulations.. You're doing great</h4>

                                <h6>Please Take Note:</h6>

                                <p>After Submitting Please Conrm your registration in your email to start managing your listings.</p>

                            </div>


                            <div class="checkbox st_check_term_conditions mt20">
                                <label>
                                    <input class="i-check term_condition" name="term_condition" type="checkbox" />
                                    <span>Note: There are a short time period on Pending listings. Spaces are limited. Activate within 10 working days. (T & C Apply)</span>

                                    I have read and accept the<a target="_blank" href="#"> terms and conditions of Hey Stranger PTY Ltd</a>        </label>
                            </div>



                            <div class="mt20">
                                <input name="btn_reg" class="btn btn-primary btn-lg" type="hidden" value="register">
                                <button class="btn btn-primary btn-lg" type="submit" >Login</button>
                            </div>

                            <a href="register2.html">Next Page</a>

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
@endsection