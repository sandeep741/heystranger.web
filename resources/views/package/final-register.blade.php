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
                                    <td><b>Accomodation :- </b></td><td>dfsfsfds</td>
                                </tr>
                                <tr>
                                    <td><b>Venue & Conference :-</b></td><td>R</td>
                                </tr>
                                <tr>
                                    <td><b>Transport:- </b></td><td>R</td>
                                </tr>
                                <tr>
                                    <td><b>additional_service:- </b></td><td>R</td>
                                </tr>


                                <tr>
                                    <td><b>Total:- </b></td><td>R  dsf</td>
                                </tr>
                                <tr>
                                    <td><b>Vat:- </b></td><td>R  dfs</td>
                                </tr>
                                <tr>
                                    <td><b>Final Amount:- </b></td><td>R  dsfds</td>
                                </tr>
                            </table>


                        </div>
                    </div>

                    <form  method="POST" action="action.php" class="register_form">
                        <div class="row">

                            <div class="col-md-6 col-md">

                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">First Name<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <input id="field-email" name="firstname" class="form-control" placeholder="Enter First Name" type="text" value="" required />
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Sur Name<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <input id="field-email" name="lastname" class="form-control" placeholder="Enter Sur Name" type="text" value="" required />
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Landline No.<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <input name="landline" class="form-control" placeholder="Enter landline" type="text" value="" required />
                                </div>

                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Mobile No.<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <input name="mobile" class="form-control" placeholder="Enter mobile" type="text" value="" required />
                                </div>
                            </div>



                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Country<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>

                                    <?php
                                    $yes_no = [];
                                    $yes_no = array(array(
                                            'value' => '',
                                            'display' => 'please select *',
                                            'data-icon' => 'stumbleupon'
                                        ),
                                        array(
                                            'value' => 'Y',
                                            'display' => 'Yes',
                                            'data-icon' => 'stumbleupon'
                                        ),
                                        array(
                                            'value' => 'N',
                                            'display' => 'No',
                                            'data-icon' => 'stumbleupon'
                                        )
                                    );
                                    ?>

                                    {!! Form::fancyselect('accommo_list', $yes_no, null, ['class'=>'form-control select-icons']) !!}
                                    @if ($errors->has('accommo_list'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('accommo_list') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Suburb / Area<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <input name="suburb" class="form-control" placeholder="Enter Suburb" type="text" value="" required />
                                </div>
                            </div>


                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">City / Town<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <input name="city" class="form-control" placeholder="Enter City/Town" type="text" value="" required />
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Address<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <textarea name="address" cols="3" rows="3" class="form-control" required ></textarea>
                                </div>

                            </div>


                            <div class="col-md-6 col-md">

                                <div class="form-group  form-group-icon-left">
                                    <label for="field-email">Email.<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-envelope input-icon input-icon-show"></i>
                                    <input name="email" class="form-control" placeholder="Enter Email" type="email" value="" required />
                                </div>
                            </div>


                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-user_name">User Name<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-user input-icon input-icon-show"></i>
                                    <input id="field-user_name" required name="username" class="form-control" placeholder="Enter Username" type="text" value="" />
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-password">Password<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-lock input-icon input-icon-show"></i>
                                    <input id="field-password" required name="password" class="form-control" type="password" placeholder="my secret password" />
                                </div>
                            </div>

                            <div class="col-md-6 col-md">
                                <div class="form-group  form-group-icon-left">
                                    <label for="field-password">Confirm Password<span class="color-red"> (*)</span></label>
                                    <i class="fa fa-lock input-icon input-icon-show"></i>
                                    <input id="field-password" required name="password" class="form-control" type="password" placeholder="my secret password" />
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt20">

                            <input  class="btn btn-primary btn-lg" type="submit" name='full_detail' value='Submit' />
                        </div>
                    </form>
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
@endsection