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
                    'name' => 'frm_package',
                    'id' => 'frm_package',
                    'url' => 'packagelist/'.(isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''),
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
                                <label class="col-lg-2 control-label">Package Name * :</label>
                                <div class="col-lg-10">
                                    {!! Form::text('name', (isset($edit_data) && !empty($edit_data) ? $edit_data->name : ''), ['class' => 'form-control required', 'placeholder' => 'Enter Your Title *']) !!}
                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            @foreach(config('constants.feature') as $key => $val)

                            <div class="form-group">
                                <label class="col-lg-2 control-label">{{ $val }} * :</label>
                                <div class="col-lg-10">
                                    <?php $arr = ['' => 'Please Select *', 'Y' => 'Yes', 'N' => 'No'] ?>
                                    {{Form::select($key,$arr, (isset($edit_data) && !empty($edit_data) ? $edit_data->$key : ''),['class'=>'form-control required'])}}
                                    @if ($errors->has($key))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first($key) }}</strong>
                                    </span>
                                    @endif 
                                </div>
                            </div>

                            @endforeach

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Package Type * :</label>
                                <div class="col-lg-10">
                                    <?php $package_arr = ['' => 'Please Select *', 'P' => 'Paid', 'F' => 'Free'] ?>
                                    {{Form::select('package_type', $package_arr, (isset($edit_data) && !empty($edit_data) ? $edit_data->package_type : ''),['class'=>'form-control required package_type'])}}
                                    @if ($errors->has('package_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('package_type') }}</strong>
                                    </span>
                                    @endif 
                                </div>
                            </div>


                            <div class="form-group commision">
                                <label class="col-lg-2 control-label">Commision (%) :</label>
                                <div class="col-lg-10">
                                    {!! Form::text('commision', (isset($edit_data) && !empty($edit_data) ? $edit_data->commision : ''), ['class' => 'form-control', 'placeholder' => 'Enter Commision *']) !!}
                                    @if ($errors->has('commision'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('commision') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'id', (isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''), ['readonly' => 'readonly']) }}
                                </div>
                            </div>

                            <div class="form-group price">
                                <label class="col-lg-2 control-label">Price * :</label>
                                <div class="col-lg-10">
                                    {!! Form::text('price', (isset($edit_data) && !empty($edit_data) ? $edit_data->price : ''), ['class' => 'form-control', 'placeholder' => 'Enter Price *']) !!}
                                    @if ($errors->has('price'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'id', (isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''), ['readonly' => 'readonly']) }}
                                </div>
                            </div>

                            <div class="form-group vat">
                                <label class="col-lg-2 control-label">Vat (%) :</label>
                                <div class="col-lg-10">
                                    {!! Form::text('vat', (isset($edit_data) && !empty($edit_data) ? $edit_data->vat : ''), ['class' => 'form-control', 'placeholder' => 'Enter Vat in %']) !!}
                                    @if ($errors->has('vat'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('vat') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'id', (isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''), ['readonly' => 'readonly']) }}
                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
Add Package
@endsection

@section('addtional_css')

@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/form_layouts.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/js/heystranger-js/client-validation.js') }}"></script>
<script type="text/javascript">

$(document).ready(function () {

    $('.commision').css("display", "none");
    $('.price').css("display", "none");
    $('.vat').css("display", "none");

    var package_type = $('.package_type').val();

    if (package_type == 'F') {

        $('.commision').css("display", "block");
        
    } else if (package_type == 'P') {

        $('.price').css("display", "block");
        $('.vat').css("display", "block");
    }


    $('.package_type').change(function () {

        var pkg_type = $(this).val();

        if (pkg_type == 'F') {
            $('.commision').css("display", "block");
            $('.price').css("display", "none");
            $('.vat').css("display", "none");
        } else if (pkg_type == 'P') {
            $('.price').css("display", "block");
            $('.vat').css("display", "block");
            $('.commision').css("display", "none");
        } else if (pkg_type == '') {
            $('.commision').css("display", "none");
            $('.price').css("display", "none");
            $('.vat').css("display", "none");
        }
    });
});

</script>

@endsection