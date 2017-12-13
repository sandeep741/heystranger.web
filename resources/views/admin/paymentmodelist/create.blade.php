@extends('admin.app')
@section('content')
<div class="content">
    <!-- Horizontal form options -->
    <div class="row">
        <div class="tabbable tab-content-bordered content-group-lg">

            <div class="tab-content">
                <div class="tab-pane fade in active has-padding" id="james">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_accomm',
                    'id' => 'frm_accomm',
                    'url' => 'paymentmodelist/'.(isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => false
                    )
                    )
                    !!}
                    @section('editMethod')
                    @show
                    <div class="panel panel-flat">

                        <div class="panel-body">

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Name :</label>
                                <div class="col-lg-10">
                                    {!! Form::text('name', (isset($edit_data) && !empty($edit_data) ? $edit_data->name : ''), ['class' => 'form-control', 'placeholder' => 'Enter Your Title *']) !!}
                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'id', (isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''), ['readonly' => 'readonly']) }}
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit form </button>
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
Add Payment Mode
@endsection

@section('addtional_css')

@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/form_layouts.js') }}"></script>
@endsection