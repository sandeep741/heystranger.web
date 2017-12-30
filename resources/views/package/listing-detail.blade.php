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
                    <h1 class="page-title text-center mt60">Register as a Partner Step 1</h1>
                </div>

                <div class="container">
                    <div class="row" data-gutter="60">
                        <div class="col-md-12 ">
                            {!!
                            Form::open(
                            array(
                            'name' => 'frm_package',
                            'id' => 'frm_package',
                            'url' => route('final_register'),
                            'autocomplete' => 'off',
                            'class' => 'register_form',
                            'files' => false
                            )
                            )
                            !!}

                            <div class="row mt20 data_field">
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-user_name">How many 
                                            Accommodation properties would you like to advertise<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>

                                        <?php
                                        $acco_list[] = array(
                                            'value' => '',
                                            'display' => 'Please Select *',
                                            'data-icon' => 'stumbleupon'
                                        );

                                        for ($i = 1; $i <= $accommo_listing; $i++) {

                                            $acco_list[] = array(
                                                'value' => $i,
                                                'display' => $i,
                                                'data-icon' => 'stumbleupon'
                                            );
                                        }

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

                                        {!! Form::fancyselect('accommo_list', $acco_list, null, ['class'=>'form-control select-icons']) !!}
                                        @if ($errors->has('accommo_list'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('accommo_list') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-password">Do you have Venue & Conference facilities on some of these property<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-lock input-icon input-icon-show"></i>
                                        {!! Form::fancyselect('shuttle', $yes_no, null, ['class'=>'form-control select-icons required']) !!}
                                        @if ($errors->has('shuttle'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('shuttle') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row mt20 data_field">
                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-user_name">Do you have your own Transport Service<span class="color-red"> (*)</span></label>
                                        <i class="fa fa-user input-icon input-icon-show"></i>
                                        {!! Form::fancyselect('transport', $yes_no, null, ['class'=>'form-control select-icons']) !!}
                                        @if ($errors->has('transport'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('transport') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group  form-group-icon-left">
                                        <label for="field-password">Would you like to advertise 
                                            Additional Service <span class="color-red"> (*)</span></label>
                                        <i class="fa fa-lock input-icon input-icon-show"></i>
                                        {!! Form::fancyselect('additional', $yes_no, null, ['class'=>'form-control select-icons']) !!}
                                        @if ($errors->has('additional'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('additional') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="checkbox st_check_term_conditions mt20">
                                <label>
                                    {{ Form::checkbox('terms_conditions', 1, null, ['class' => 'i-check term_condition']) }}I have read and accept the<a target="_blank" href="#"> terms and conditions</a>        </label>
                                @if ($errors->has('terms_conditions'))
                                <span class="help-block" style = "display:block;color:red;">
                                    <strong>{{ $errors->first('terms_conditions') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="text-center mt20">

                                {{ Form::input('hidden', 'pkg_id', (isset($pkg_id_ecrypt) && !empty($pkg_id_ecrypt) ? $pkg_id_ecrypt : ''), ['readonly' => 'readonly']) }}
                                <button class="btn btn-primary btn-lg" type="submit" name='sub_detail'>Submit</button>
                            </div>
                            <br>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</div>
@endsection

@section('pageTitle')
Listing Detail
@endsection

@section('addtional_css')
@endsection

@section('jscript')
@endsection