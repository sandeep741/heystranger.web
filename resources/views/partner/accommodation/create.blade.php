@extends('admin.app')
@section('content')

<div class="content">
    <!-- Horizontal form options -->
    <div class="row">
        <div class="tabbable tab-content-bordered content-group-lg">
            <ul class="nav nav-tabs nav-lg nav-tabs-highlight">

                <li class="{{ (session()->get('tab_type') < 1) ? 'active' : '' }}">
                    <a href="#james" data-toggle="{{ (session()->get('tab_type') < 1) ? 'tab' : '' }}">
                        Accommodation Detail <span class="status-mark position-right border-danger"></span>
                    </a>
                </li>
                <li class="{{ (session()->get('tab_type') == 1) ? 'active' : '' }}">
                    <a href="#rooms" data-toggle="{{ (session()->get('tab_type') == 1) ? 'tab' : '' }}">
                        Room<span class="status-mark position-right border-success"></span>
                    </a>
                </li>
                <li class="{{ (session()->get('tab_type') <= 2) ? 'active' : '' }}">
                    <a href="#william" data-toggle="{{ (session()->get('tab_type') <= 1) ? 'tab' : '' }}">
                        Keywords & Meta Tags <span class="status-mark position-right border-success"></span>
                    </a>
                </li>
                <li>
                    <a href="#jared" data-toggle="tab">
                        Video & Map <span class="status-mark position-right border-warning"></span>
                    </a>
                </li>

            </ul>
            <div class="tab-content">

                <!---Accommodation form--->
                <div class="tab-pane fade in {{ (session()->get('tab_type') < 1) ? 'active' : '' }} has-padding" id="james">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_accommodation',
                    'id' => 'frm_accommodation',
                    'url' => 'accomodation/'.(isset($edit_data) && !empty($edit_data) ? $edit_data->id : ''),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Accommodation Detail</h5>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('name', (isset($edit_data) && !empty($edit_data) ? $edit_data->name : ''), ['class' => 'form-control', 'placeholder' => 'Enter Accommodation Name*']) !!}
                                    @if ($errors->has('name'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('accom_type',[''=>'Select type of Accommodation']+@$arr_accomm->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['class'=>'form-control'])}}

                                    @if ($errors->has('accom_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('accom_type') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('rating',[''=>'Start Ratings']+@config('constants.star_rating'), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['class'=>'form-control'])}}
                                    @if ($errors->has('rating'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                    @endif   

                                </div>



                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('reserving_email', (isset($edit_data) && !empty($edit_data) ? $edit_data->reserving_email : ''), ['class' => 'form-control email', 'placeholder' => 'Enter Reserving Email']) !!}
                                    @if ($errors->has('reserving_email'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('reserving_email') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('country',[''=>'Select Country *']+@$arr_country->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->country_id : ''),['id'=> 'state_id', 'class'=>'form-control country_id'])}}

                                    @if ($errors->has('country'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('state',[''=>'Select State *'], (isset($edit_data) && !empty($edit_data) ? @$edit_data->state_id : ''),['id'=> 'state_id', 'class'=>'form-control state_id'])}}

                                    @if ($errors->has('state'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('city',[''=>'Select city *'], (isset($edit_data) && !empty($edit_data) ? @$edit_data->city_id : ''),['id'=> 'address_city_id', 'class'=>'form-control address_city_id'])}}

                                    @if ($errors->has('city'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('street_address', (isset($edit_data) && !empty($edit_data) ? $edit_data->stree_address : ''), ['class' => 'form-control', 'placeholder' => 'Enter Street Address']) !!}
                                    @if ($errors->has('street_address'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('street_address') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('area', (isset($edit_data) && !empty($edit_data) ? $edit_data->area : ''), ['class' => 'form-control', 'placeholder' => 'Enter suburb Area']) !!}
                                    @if ($errors->has('area'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('contact_no', (isset($edit_data) && !empty($edit_data) ? $edit_data->contact_no : ''), ['class' => 'form-control', 'placeholder' => 'Enter Contact Number']) !!}
                                    @if ($errors->has('contact_no'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('alternate_no', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Enter Alternate no']) !!}
                                    @if ($errors->has('area'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('alternate_no') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{ Form::file('accomm_images[]', ['id' => 'acco_image', 'class' => 'file-styled maxfile', 'multiple' => true]) }}
                                    @if ($errors->has('accomm_images'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('accomm_images') }}</strong>
                                    </span>
                                    @endif
                                    <div class="validation text-danger" style="display:none;"></div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-3 control-label">Establishment Detail:</label>

                                <div class="col-lg-9 col-md-9 col-sm-9">
                                    {!! Form::textarea('establish_details', (isset($edit_data) && !empty($edit_data) ? $edit_data->establish_details : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a description about your establishment']) !!}
                                    @if ($errors->has('establish_details'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('establish_details') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" name="acco" value="accom" class="btn btn-primary">Submit form </button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---Room form--->
                <div class="tab-pane {{ (session()->get('tab_type') == 1) ? 'in active' : '' }} fade has-padding" id="rooms">


                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_accommodation',
                    'id' => 'frm_accommodation',
                    'url' => route('room'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Rooms</h5>
                        </div>
                        <div class="panel-body">


                            <div class="form-group">
                                <label class="col-lg-1 control-label">Description:</label>
                                <div class="col-lg-9">
                                    {!! Form::textarea('room_desc', (isset($edit_data) && !empty($edit_data) ? $edit_data->room_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a description about your Accommodation']) !!}
                                    @if ($errors->has('establish_details'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('establish_details') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group" id='R1'>
                                    
                                <div class="col-md-2">

                                    {{-- Form::select('room_type',[''=>'Select type of Room']+@$arr_room->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['class'=>'select-icons']) --}}

                                    <?php 
                                    
                                    $room_type = []; 
                                    $room_type[] = array(
                                            'value' => '',
                                            'display' => 'Select Type of Room',
                                            'data-icon' => 'stumbleupon'
                                        );
                                            foreach($arr_room as $value){
                                            $room_type[] = array(
                                            'value' => $value->id,
                                            'display' => $value->name,
                                            'data-icon' => 'stumbleupon'
                                        );
                                            }
                                            
                                    
                                    ?>
                                    {!! Form::multiselect('capacity', $room_type, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons']) !!}
                                    
                                    @if ($errors->has('capacity'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                    @endif
                                    
                                </div>



                                <div class="col-md-2">
                                    <?php 
                                    
                                    $room_cap = [];

                                    for ($i = 1; $i <= 50; $i++) {

                                        $room_cap[] = array(
                                            'value' => $i,
                                            'display' => $i,
                                            'data-icon' => 'stumbleupon'
                                        );
                                    }
                                    ?>
                                    
                                    {!! Form::multiselect('capacity', $room_cap, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons']) !!}
                                    
                                    @if ($errors->has('capacity'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('capacity') }}</strong>
                                    </span>
                                    @endif
                                    
                                </div>

                                <div class="col-md-2">
                                    <input type="text" name='avail[]' class="form-control" placeholder="Room Available">
                                </div>



                                <div class="col-md-2">
                                    <input type="text" name='room_price[]' class="form-control" placeholder="Enter Rates">
                                </div>

                                <div class="col-md-2">
                                    <input type="text" name='descr[]' class="form-control" placeholder="Description">
                                </div>

                                <div class="col-md-2">
                                    <input type="file"  class="file-styled" name='room_img[]'>
                                </div>
                            </div>

                            <div id='room_res'>

                            </div>
                            <a href="javascript:void(0)" id="add_room" class='btn btn-Success' >Add</a>


                            <h5>Do you have Venue & Conference facilities at this property</h5>			

                            <div class="form-group">

                                <div class="col-md-2">
                                    <select  id='condit' name="ven_con_cond" data-placeholder="Choose Here" class="select-icons" >
                                        <option value="">Choose Here</option>	

                                        <option data-icon="stumbleupon" value="Yes">Yes</option>
                                        <option data-icon="stumbleupon" value="No">No</option>

                                    </select>
                                </div>

                            </div>
                            <div id='cv'>
                                <h6>Venue</h6>


                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" cols="3" name='venmain_descr'  class="form-control" placeholder="Give a description about your Venue facility"></textarea>
                                    </div>
                                </div>	

                                <div class="form-group">

                                    <div class="col-md-2">
                                        <input type="text" name='venue_name[]' class="form-control" placeholder="Enter Venue Name">	
                                    </div>

                                    <div class="col-md-2">

                                        <input type="text" name='venue_avail[]' class="form-control" placeholder="Capacity">	

                                    </div>


                                    <div class="col-md-2">
                                        <input type="text" name='venue_price[]' class="form-control" placeholder="Enter Venue Rates">
                                    </div>


                                    <div class="col-md-2">
                                        <input type="text" name='venue_descr[]' class="form-control" placeholder="Description">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="file"  class="file-styled" name='venue_img[]'>
                                    </div>
                                </div>

                                <div id='venue_res'>

                                </div>
                                <a href="javascript:void(0)" id="add_venue" class='btn btn-Success' >Add</a>


                                <br>
                                <br>
                                <h6>Conference</h6>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" cols="3" name='conmain_descr'  class="form-control" placeholder="Give a description about your Conference facility"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">

                                    <div class="col-md-2">
                                        <input type="text" name='confer_name[]' class="form-control" placeholder="Enter Conference Name">	
                                    </div>


                                    <div class="col-md-2">

                                        <input type="text" name='confer_avail[]' class="form-control" placeholder="Capacity">	
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text" name='confer_price[]' class="form-control" placeholder="Enter Conference Rates">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="text" name='confer_descr[]' class="form-control" placeholder="Description">
                                    </div>

                                    <div class="col-md-2">
                                        <input type="file"  class="file-styled" name='confer_img[]'>
                                    </div>
                                </div>

                                <div id='confer_res'>

                                </div>
                                
                            </div>
                            
                                <div class="text-right">
                                <button type="submit" name="acco" value="room" class="btn btn-primary">Submit</button>
                            </div>


                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>

                <!---meta tag form--->
                <div class="tab-pane fade {{ (session()->get('tab_type') == 3) ? 'in active' : '' }} has-padding" id="william">
                    <form action="#" class="form-horizontal">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Keywords & Metatags</h5>
                            </div>
                            <div class="panel-body">


                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Title:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Enter Your Title">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Keywords:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Enter your Keywords here"></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Meta Tags:</label>
                                    <div class="col-lg-9">
                                        <textarea rows="5" cols="5" class="form-control" placeholder="Enter your Meta Tags here"></textarea>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!---video & map form--->
                <div class="tab-pane fade has-padding" id="jared">
                    <form action="#" class="form-horizontal">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Video and Map</h5>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Accommodation Video </label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Paste Your Accommodation Link here">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Accommodation Location:</label>
                                    <div class="col-lg-9">
                                        <input type="text" class="form-control" placeholder="Enter Your Google Map Link here">
                                    </div>
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Update </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('pageTitle')
Add Accommodation
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


<script>
$(document).ready(function () {


    $('#add_act').click(function ()
    {


        var ran = Math.floor((Math.random() * 100000) + 1);

        var uid = 'A' + ran;

        var form_group = '<div class="form-group" id="' + uid + '">';
        form_group += '<div class="col-lg-4 col-md-4 col-sm-4">';
        form_group += '<input type="text" class="form-control"  value="" placeholder="Name Of Attraction" name="est_name[]">';
        form_group += '</div>';
        form_group += '<div class="col-lg-4 col-md-4 col-sm-4"><select  data-placeholder="Attraction Activity" class="form-control" name="actvity2[]" ><option value="">Attraction Activity</option>';




<?php
if (isset($arr_surr) && !empty($arr_surr)) {
    foreach ($arr_surr as $surr_dat) {
        ?>
                form_group += '<option data-icon="stumbleupon" value="<?php echo (isset($surr_dat) && !empty($surr_dat)) ? $surr_dat->id : '' ?>"><?php echo (isset($surr_dat) && !empty($surr_dat)) ? $surr_dat->name : '' ?></option>';
        <?php
    }
}
?>





        form_group += '</select></div>';

        form_group += '<div class="col-lg-4 col-md-4 col-sm-4"><input type="text" class="form-control"  value="" placeholder="Approximate Distance" name="approx_dis[]"></div><br><a href="javascript:void(0)" onclick="remove_activity(' + ran + ')">Remove</a></div>';

        $('#res').append(form_group);

    });


});

function remove_activity(did)
{
    var final = 'A' + did;
    $('#' + final).remove();
}

</script>

<script>
    $(document).ready(function () {

        $('#add_room').click(function ()
        {

            var ran = Math.floor((Math.random() * 100000) + 1);

            var uid = 'R' + ran;

            var room_group = '<div class="form-group" id="' + uid + '"><div class="col-md-2">';
            room_group += '<select  data-placeholder="Room Type" class="form-control select-icons" name="room_type[]" >';
            room_group += '<option value="">Choose Room Type</option>';

<?php
if (isset($arr_room) && !empty($arr_room)) {
    foreach ($arr_room as $room_dat) {
        ?>
                    room_group += '<option value="<?php echo (isset($room_dat) && !empty($room_dat)) ? $room_dat->id : '' ?>"><?php echo (isset($room_dat) && !empty($room_dat)) ? $room_dat->name : '' ?></option>';
        <?php
    }
}
?>



            room_group += '</select></div>';

            room_group += '<div class="col-md-2"><select  data-placeholder="Max Guest" class="form-control" name="cap[]" >';
            room_group += '<option value="">Max Guest</option>';
<?php
for ($cap = 1; $cap <= 20; $cap++) {
    ?>
                room_group += '<option  value="<?php echo $cap; ?>"><?php echo $cap; ?></option>';
    <?php
}
?>
            room_group += '</select></div>';

            room_group += '<div class="col-md-2"><input type="text" name="avail[]" class="form-control" placeholder="Room Available"></div>';

            room_group += '<div class="col-md-2"><input type="text" name="room_price[]" class="form-control" placeholder="Enter Rates"></div>';

            room_group += '<div class="col-md-2"><input type="text" name="descr[]" class="form-control" placeholder="Description"></div>';

            room_group += '<div class="col-md-2"><input type="file" name="room_img[]" class="form-control" placeholder="room_img[]"></div><br><a href="javascript:void(0)" onclick="remove_room(' + ran + ')">Remove</a></div>';

            $('#room_res').append(room_group);

        });




    });

    function remove_room(did)
    {
        var final = 'R' + did;
        $('#' + final).remove();
    }

</script>



<script>
    $(document).ready(function () {


        $('#add_extra').click(function ()
        {

            var ran = Math.floor((Math.random() * 100000) + 1);

            var uid = 'E' + ran;

            var extra_group = '<div class="form-group" id="' + uid + '">';

            extra_group += '<div class="col-md-3"><input type="text" name="item[]" class="form-control" placeholder="Item"></div>';

            extra_group += '<div class="col-md-3"><input type="text" name="extra_price[]" class="form-control" placeholder="Enter Price"></div>';

            extra_group += '<div class="col-md-3"><input type="file" name="extra_img[]" class="form-control" placeholder="Enter Price"></div>';

            extra_group += '<div class="col-md-3"><select data-placeholder="Extra Condition" class="select-icons" name="extra_cond[]" ><option data-icon="stumbleupon" value="">Choose Condition</option><option data-icon="stumbleupon" value="yes">Yes</option><option data-icon="stumbleupon" value="No">No</option></select></div><br><a href="javascript:void(0)" onclick="remove_extra(' + ran + ')">Remove</a></div>';


            $('#extra_res').append(extra_group);

        });

    });

    function remove_extra(did)
    {
        var final = 'E' + did;
        $('#' + final).remove();
    }

</script>



<script>
    $(document).ready(function () {
        $('#cv').css("display", "none");

        var befco = $('#condit').val();

        if (befco == 'Yes')
        {
            $('.both').css("display", "block");
        } else
        {
            $('.both').css("display", "none");
        }


        $('#condit').change(function ()
        {
            var co = $('#condit').val();

            if (co == 'Yes')
            {
                $('#cv').css("display", "block");
                $('.both').css("display", "block");
            } else
            {
                $('#cv').css("display", "none");
                $('.both').css("display", "none");

            }


        });
    });
</script>	

<script>
    $(document).ready(function () {
        var bm = $('#vid_con').val();

        if (bm == 'Yes')
        {
            $('#viddiv').css("display", "block");
        }

        $('#vid_con').change(function ()
        {
            var conn2 = $('#vid_con').val();

            if (conn2 == 'Yes')
            {
                $('#viddiv').css("display", "block");
            } else
            {
                $('#vidtext').val('');

                $('#viddiv').css("display", "none");
            }


        });
    });
</script>


<script>
    $(document).ready(function () {


        $('#add_venue').click(function ()
        {

            var ran = Math.floor((Math.random() * 100000) + 1);
            var uid = 'V' + ran;


            var venue_group = '<div class="form-group" id="' + uid + '">';

            venue_group += '<div class="col-md-2"><input type="text" name="venue_name[]" class="form-control" placeholder="Enter Venue Name"></div>';

            venue_group += '<div class="col-md-2"><input type="text" name="venue_avail[]" class="form-control" placeholder="Capacity"></div>';

            venue_group += '<div class="col-md-2"><input type="text" name="venue_price[]" class="form-control" placeholder="Enter Venue Rates"></div>';


            venue_group += '<div class="col-md-2"><input type="text" name="venue_descr[]" class="form-control" placeholder="Description"></div>';

            venue_group += '<div class="col-md-2"><input type="file"  class="form-control" name="venue_img[]"></div><br><a href="javascript:void(0)" onclick="remove_venue(' + ran + ')">Remove</a></div>';





            $('#venue_res').append(venue_group);

        });


    });

    function remove_venue(did)
    {
        var final = 'V' + did;
        $('#' + final).remove();
    }
</script>	


<script>
    $(document).ready(function () {


        $('#add_confer').click(function ()
        {

            var ran = Math.floor((Math.random() * 100000) + 1);
            var uid = 'C' + ran;

            var confer_group = '<div class="form-group" id="' + uid + '"><div class="col-md-2"><input type="text" name="confer_name[]" class="form-control" placeholder="Enter Conference Name"></div>';

            confer_group += '<div class="col-md-2"><input type="text" name="confer_avail[]" class="form-control" placeholder="Capacity"></div>';

            confer_group += '<div class="col-md-2"><input type="text" name="confer_price[]" class="form-control" placeholder="Enter Conference Rates"></div>';


            confer_group += '<div class="col-md-2"><input type="text" name="confer_descr[]" class="form-control" placeholder="Description"></div>';

            confer_group += '<div class="col-md-2"><input type="file"  class="form-control" name="confer_img[]"></div><br><a href="javascript:void(0)" onclick="remove_confer(' + ran + ')">Remove</a></div>';





            $('#confer_res').append(confer_group);

        });

    });

    function remove_confer(did)
    {
        var final = 'C' + did;
        $('#' + final).remove();
    }

</script>




@endsection