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
                            <form  class="register_form" data-reset="false"  method="post" action="#" >

                                <div class="row mt20 data_field">
                                    <div class="col-md-12">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-user_name">Your First&Last Name<span class="color-red"> (*)</span></label>
                                            <i class="fa fa-user input-icon input-icon-show"></i>
                                            <input id="field-user_name" name="user_name" class="form-control" placeholder="e.g. John Doe" type="text" value="" />
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt20 data_field">
                                    <div class="col-md-12">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-user_name">Your Email Id<span class="color-red"> (*)</span></label>
                                            <i class="fa fa-user input-icon input-icon-show"></i>
                                            <input id="field-user_name" name="user_name" class="form-control" placeholder="example@gmail.com" type="text" value="" />
                                        </div>
                                    </div>

                                </div>


                                <div class="row mt20 data_field">
                                    <div class="col-md-6">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-email">Select Country<span class="color-red"> (*)</span></label>
                                            <i class="fa fa-envelope input-icon input-icon-show"></i>
                                            <input id="field-email" name="email" class="form-control" placeholder="e.g. Country Name" type="text" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-full_name">Select State</label>
                                            <i class="fa fa-user input-icon input-icon-show"></i>
                                            <input id="field-full_name" name="full_name" class="form-control" placeholder="e.g. State Name" type="text" value="" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt20 data_field">
                                    <div class="col-md-6">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-email">Select City<span class="color-red"> (*)</span></label>
                                            <i class="fa fa-envelope input-icon input-icon-show"></i>
                                            <input id="field-email" name="email" class="form-control" placeholder="e.g. City Name" type="text" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-full_name">Enter Contact No</label>
                                            <i class="fa fa-user input-icon input-icon-show"></i>
                                            <input id="field-full_name" name="full_name" class="form-control" placeholder="+27 00 000 000" type="text" value="" />
                                        </div>
                                    </div>
                                </div>


                                <div class="row mt20 data_field">
                                    <div class="col-md-12">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-user_name">Create Login Name<span class="color-red"> (*)</span></label>
                                            <i class="fa fa-user input-icon input-icon-show"></i>
                                            <input id="field-user_name" name="user_name" class="form-control" placeholder="johndoe" type="text" value="" />
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt20 data_field">
                                    <div class="col-md-6">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-email">Create Your Password<span class="color-red"> (*)</span></label>
                                            <i class="fa fa-envelope input-icon input-icon-show"></i>
                                            <input id="field-email" name="email" class="form-control" placeholder="e.g. 123" type="password" value="" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group  form-group-icon-left">
                                            <label for="field-full_name">Repeat Password</label>
                                            <i class="fa fa-user input-icon input-icon-show"></i>
                                            <input id="field-full_name" name="full_name" class="form-control" placeholder="123" type="password" value="" />
                                        </div>
                                    </div>
                                </div>


                                <div class="checkbox st_check_term_conditions mt20">
                                    <label>
                                        <input class="i-check term_condition" name="term_condition" type="checkbox" />I have read and accept the<a target="_blank" href="#"> terms and conditions</a>        </label>
                                </div>
                                <div class="text-center mt20">
                                    <input name="btn_reg" class="btn btn-primary btn-lg" type="hidden" value="register">
                                    <button class="btn btn-primary btn-lg" type="button" onclick="window.location.href = 'register1'" >Register</button>
                                </div>
                            </form>

                        </div>

                        <div class="col-md-6">

                            <h1 class="page-title text-center mt60">Sign In </h1>

                            <div class="row mt20 data_field">
                                <div class="col-md-12">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-user_name">Your Login Name<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        <input id="field-user_name" name="user_name" class="form-control" placeholder="johndoe" type="text" value="" />
                                    </div>
                                </div>

                            </div>

                            <div class="row mt20 data_field">
                                <div class="col-md-12">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-user_name">Enter Password<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        <input id="field-user_name" name="user_name" class="form-control" placeholder="johndoe" type="password" value="" />
                                    </div>
                                </div>

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