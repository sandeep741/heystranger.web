@extends('admin.app')
@section('content')
<div class="content" style="margin: 50px 0 0 0px !important">
    <!-- Horizontal form options -->
    <div class="row">
        <div class="tabbable tab-content-bordered content-group-lg">

            <div class="tab-content">
                <div class="tab-pane fade in active has-padding">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_accomm',
                    'id' => 'frm_accomm',
                    'url' => '/proof-payment',
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}

                    <div class="panel panel-flat">

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Upload Proof :</label>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{ Form::file('proof_image[]', ['id' => 'proof_image', 'class' => 'file-styled', 'multiple' => false]) }}
                                    @if ($errors->has('proof_image.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('proof_image.0') }}</strong>
                                    </span>
                                    @endif
                                    <div class="validation text-danger" style="display:none;"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" name='upload' class="btn btn-primary">Upload <i class="icon-arrow-right14 position-right"></i></button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pageTitle')
Proof of Payment
@endsection

@section('addtional_css')
@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/form_layouts.js') }}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/city.js')}}"></script>
<script type="text/javascript" src="{{asset('/assets/js/heystranger-js/client-validation.js')}}"></script>
@endsection