@extends('admin.app')
@section('content')

{!!
Form::open(
array(
'name' => 'frm_accommodation',
'id' => 'frm_accommodation',
'url' => route('invoice'),
'autocomplete' => 'off',
'class' => 'form-horizontal',
'files' => true
)
)
!!}

<?php
$option = [];

$option = array(array(
        'value' => '',
        'display' => 'select',
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


<div class="panel panel-flat">
    <div class="panel-heading">
        <h5 class="panel-title">Select Package</h5>
    </div>

    <div class="panel-content">
        <div class="content">
            <div class="checkbox">
                <label>
                    <input type="radio" name="radio" class="control-primary" checked="checked">
                    Launch Promotion - (<b>R 595.00</b> Exl. VAT per Listing) <b>Per Year - 50% Discount</b> (Deal directly with Clients) “Limited Spaces Available”
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="radio" name="radio" class="control-primary" >
                    Per Year - <b>R 1200.00</b> Exl VAT per Listing (Deal directly with clients) <b>Normal Price</b>
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="radio" name="radio" class="control-success">
                    15% Commission - (R350.00 <b>Once off</b> Registration Fee Exl.VAT) <b>"First Registration Only"</b>
                </label>
            </div>

            <div class="checkbox">
                <label>
                    <input type="radio" name="radio" class="control-success">
                    15% Commission - (Already register for commission) <b>Unlimited listings</b>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-flat">

    <div class="panel-heading">
        <h6 class="panel-title">Taxes</h6>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Vat/Tax</label>
                        <input type="text" value="" placeholder="Vat%" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>I don't need to pay VAT</label>


                        {!! Form::fancyselect('vat', $option, null, ['class'=>'form-control select-icons']) !!}

                        @if ($errors->has('vat'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('vat') }}</strong>
                        </span>
                        @endif


                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>City Tax</label>
                        <input type="text" value="" placeholder="Tax%" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label>I don't need to pay Tax</label>
                        {!! Form::fancyselect('tax', $option, null, ['class'=>'form-control select-icons']) !!}

                        @if ($errors->has('tax'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('tax') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

        
    </div>
</div>

<div class="panel panel-flat">

    <div class="panel-heading">
        <h6 class="panel-title">Statement Detail</h6>

        
            <div class="form-group">
                <div class="row">

                    <div class="col-md-6">
                        <label>Select Statement Recipient</label>
                        <select class="form-control select">
                            <option value="germany" selected="selected">Option here</option>
                            <option value="france">Option here</option>

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Does the recipient have the same address as your property?</label>
                        {!! Form::fancyselect('property', $option, null, ['class'=>'form-control select-icons']) !!}

                        @if ($errors->has('property'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('property') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        <label>Address</label>
                        {!! Form::textarea('address', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Enter Address']) !!}
                        @if ($errors->has('address'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                        @endif
                    </div>

                </div>
            </div>

        

    </div>
</div>

<div class="panel panel-flat">

    <div class="panel-heading">
        <h6 class="panel-title">Bank Details</h6>

        

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Recipient Name</label>

                        {!! Form::text('recipent_name', null, ['class' => 'form-control', 'placeholder' => 'Recipient Name']) !!}
                        @if ($errors->has('recipent_name'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('recipent_name') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label>Bank Name</label>
                        {!! Form::text('bank_name', null, ['class' => 'form-control', 'placeholder' => 'Bank Name']) !!}
                        @if ($errors->has('bank_name'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('bank_name') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">

                    <div class="col-md-6">
                        <label>Account Type</label>
                        <?php
                        $account_type = [];

                        $account_type = array(array(
                                'value' => '',
                                'display' => 'Type of Account',
                                'data-icon' => 'stumbleupon'
                            ),
                            array(
                                'value' => 'dinner_club',
                                'display' => 'Diner Club',
                                'data-icon' => 'stumbleupon'
                            ),
                            array(
                                'value' => 'discover',
                                'display' => 'Discover',
                                'data-icon' => 'stumbleupon'
                            ),
                            array(
                                'value' => 'visa',
                                'display' => 'Visa',
                                'data-icon' => 'stumbleupon'
                            ),
                            array(
                                'value' => 'master_card',
                                'display' => 'Master Card',
                                'data-icon' => 'stumbleupon'
                            ),
                            array(
                                'value' => 'american_express',
                                'display' => 'American Express',
                                'data-icon' => 'stumbleupon'
                            ),
                            array(
                                'value' => 'jcp',
                                'display' => 'JCB Express',
                                'data-icon' => 'stumbleupon'
                            ),
                            array(
                                'value' => 'paypal',
                                'display' => 'Paypal',
                                'data-icon' => 'stumbleupon'
                            )
                        );
                        ?>
                        {!! Form::fancyselect('account_type[]', $account_type, null, ['class'=>'form-control select-icons required']) !!}

                        @if ($errors->has('account_type'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('account_type') }}</strong>
                        </span>
                        @endif



                    </div>
                    <div class="col-md-6">
                        <label>Account Number</label>
                        {!! Form::text('account_no', null, ['class' => 'form-control', 'placeholder' => 'Account Number']) !!}
                        @if ($errors->has('account_no'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('account_no') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <label>Branch Code</label>
                        {!! Form::text('branch_code', null, ['class' => 'form-control', 'placeholder' => 'Branch Code']) !!}
                        @if ($errors->has('branch_code'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('branch_code') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label>Proof of Payment email address</label>
                        {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Proof of Payment email address']) !!}
                        @if ($errors->has('email'))
                        <span class="help-block" style = "display:block;color:red;">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif

                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="checkbox">
                        <label>

                            {{ Form::checkbox('term_condition', 1, null, ['class' => 'control-primary']) }}
                            <p>	Note: There are a short time period on Pending listings. Spaces are limited. Activate within 10 working days. (T & C Apply)</p>
                            <p>I hereby confirm to have read and except the Terms & Condition of Hey Stranger PTY Ltd</p>
                        </label>
                    </div>

                </div>
            </div>

            <div class="text-right">
                <button type="submit" class="btn btn-primary">Activate Now <i class="icon-arrow-right14 position-right"></i></button>
            </div>
    </div>
</div>

{!! Form::close() !!}
@endsection

@section('pageTitle')
Partner Dashboard
@endsection

@section('addtional_css')
@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/d3.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/d3_tooltip.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/switchery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/bootstrap_multiselect.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/dashboard.js') }}"></script>
@endsection