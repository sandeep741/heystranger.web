@extends('admin.app')
@section('content')

<div class="content">
    <!-- Horizontal form options -->
    <div class="row">
        <div class="tabbable tab-content-bordered content-group-lg">
            <ul class="nav nav-tabs nav-lg nav-tabs-highlight">

                <li class="{{ (empty(session()->get('tab_type'))) ? 'active' : '' }}">
                    <a href="#accommodation" data-toggle="{{ (session()->get('tab_type') < 1) ? 'tab' : '' }}">
                        Accommodation Detail <span class="status-mark position-right border-danger"></span>
                    </a>
                </li>
                <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '2') ? 'in active' : '' }}">
                    <a href="#rooms" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '2') ? 'tab' : '' }}">
                        Room<span class="status-mark position-right border-success"></span>
                    </a>
                </li>
                <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '3') ? 'active' : '' }}">
                    <a href="#activity" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '3') ? 'tab' : '' }}">
                        Activities <span class="status-mark position-right border-success"></span>
                    </a>
                </li>
                <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '4') ? 'active' : '' }}">
                    <a href="#policy" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '4') ? 'tab' : '' }}">
                        Policies <span class="status-mark position-right border-success"></span>
                    </a>
                </li>
                <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '5') ? 'active' : '' }}">
                    <a href="#keywords" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '5') ? 'tab' : '' }}">
                        Keywords & Meta Tags <span class="status-mark position-right border-success"></span>
                    </a>
                </li>
                <li class="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '6') ? 'active' : '' }}">
                    <a href="#videomap" data-toggle="{{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '6') ? 'tab' : '' }}">
                        Video & Map <span class="status-mark position-right border-warning"></span>
                    </a>
                </li>

            </ul>
            <div class="tab-content">

                <!---Accommodation form--->
                <div class="tab-pane fade {{ (empty(session()->get('tab_type'))) ? 'in active' : '' }} has-padding" id="accommodation">

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
                                    {{Form::select('accom_type',[''=>'Select type of Accommodation']+@$arr_accomm->pluck('name','id')->toArray(), null,['class'=>'form-control'])}}

                                    @if ($errors->has('accom_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('accom_type') }}</strong>
                                    </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {{Form::select('rating',[''=>'Start Ratings']+@config('constants.star_rating'), null,['class'=>'form-control'])}}
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
                                    {!! Form::text('area', null, ['class' => 'form-control', 'placeholder' => 'Enter suburb Area']) !!}
                                    @if ($errors->has('area'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('contact_no', null, ['class' => 'form-control', 'placeholder' => 'Enter Contact Number']) !!}
                                    @if ($errors->has('contact_no'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                    </span>
                                    @endif

                                </div>

                            </div>

                            <div class="form-group">

                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    {!! Form::text('alternate_no', null, ['class' => 'form-control', 'placeholder' => 'Enter Alternate no']) !!}
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
                                    {!! Form::textarea('establish_details', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control', 'placeholder' => 'Give a description about your establishment']) !!}
                                    @if ($errors->has('establish_details'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('establish_details') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}

                                </div>
                            </div>

                            <div class="text-right">
                                <button type="submit" name="acco" value="" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>

                <!---Room form--->
                <div class="tab-pane {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '2') ? 'in active' : '' }} fade has-padding" id="rooms">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_room',
                    'id' => 'frm_room',
                    'url' => route('room_detail'),
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
                                    {!! Form::textarea('room_desc', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a description about your Accommodation *']) !!}
                                    @if ($errors->has('room_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group parentss">

                                <div class="col-md-2">

                                    {{-- Form::select('room_type[]',[''=>'Select type of Room']+@$arr_room->pluck('name','id')->toArray(), null,['class'=>'select-icons']) --}}

                                    <?php
                                    $room_type = [];
                                    $room_type[] = array(
                                        'value' => '',
                                        'display' => 'Type of Room *',
                                        'data-icon' => 'stumbleupon'
                                    );

                                    if (isset($arr_room) && !empty($arr_room)) {
                                        foreach ($arr_room as $value) {
                                            $room_type[] = array(
                                                'value' => $value->id,
                                                'display' => $value->name,
                                                'data-icon' => 'stumbleupon'
                                            );
                                        }
                                    }

                                    $room_cap = [];

                                    $room_cap[] = array(
                                        'value' => '',
                                        'display' => 'Max Guest *',
                                        'data-icon' => 'stumbleupon'
                                    );

                                    for ($i = 1; $i <= 50; $i++) {

                                        $room_cap[] = array(
                                            'value' => $i,
                                            'display' => $i,
                                            'data-icon' => 'stumbleupon'
                                        );
                                    }
                                    ?>
                                    {!! Form::fancyselect('room_type[]', $room_type, null, ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('room_type.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_type.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">

                                    {!! Form::fancyselect('guest[]', $room_cap, null, ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('guest.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('guest.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">

                                    {!! Form::text('room_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Room Available *']) !!}
                                    @if ($errors->has('room_avail.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_avail.0') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="col-md-2">
                                    {!! Form::text('room_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Room Price *']) !!}
                                    @if ($errors->has('room_price.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_price.0') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('room_short_desc[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}
                                    @if ($errors->has('room_short_desc.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_short_desc.0') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-2">
                                    {{ Form::file('room_img[]', ['id' => 'room_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                    @if ($errors->has('room_img'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_img') }}</strong>
                                    </span>
                                    @endif
                                    {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}

                                </div>
                            </div>

                            <a href="javascript:void(0)" class='btn btn-success btn-add-more' >Add More</a>


                            <h5>Do you have Venue & Conference facilities at this property</h5>			

                            <div class="form-group">

                                <div class="col-md-2">
                                    <select  id='condit' name="ven_con_cond" data-placeholder="Choose Here" class="select-icons" >
                                        <option value="">Choose Here</option>	

                                        <option data-icon="stumbleupon" value="Y">Yes</option>
                                        <option data-icon="stumbleupon" value="N">No</option>

                                    </select>
                                </div>

                            </div>
                            <div id='cv'>

                                <h6>Venue</h6>


                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">


                                        {!! Form::textarea('venue_desc', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a description about your Venue facility *']) !!}
                                        @if ($errors->has('venue_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_desc') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>	

                                <div class="form-group venu-parents">

                                    <div class="col-md-2">

                                        {!! Form::text('venue_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Venue Name *']) !!}
                                        @if ($errors->has('venue_name'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">

                                        {!! Form::text('venue_capacity[]', null, ['class' => 'form-control required', 'placeholder' => 'Capacity *']) !!}
                                        @if ($errors->has('capacity.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('capacity.0') }}</strong>
                                        </span>
                                        @endif



                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('venue_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Venue Price *']) !!}
                                        @if ($errors->has('venue_price.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_price.0') }}</strong>
                                        </span>
                                        @endif

                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('venue_short_descr[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}
                                        @if ($errors->has('venue_short_descr.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_short_descr.0') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="col-md-2">
                                        {{ Form::file('venue_img[]', ['id' => 'venue_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                        @if ($errors->has('venue_img.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_img.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <a href="javascript:void(0)" class="venu-add-more btn btn-success" >Add More</a>
                                <br>
                                <br>
                                <h6>Conference</h6>

                                <div class="form-group">
                                    <label class="col-lg-1 control-label">Description:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('confer_desc', null, ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a description about your Conference facility *']) !!}
                                        @if ($errors->has('confer_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group confer-parents">

                                    <div class="col-md-2">

                                        {!! Form::text('confer_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Conference Name *']) !!}
                                        @if ($errors->has('confer_name.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_name.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">

                                        {!! Form::text('confer_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Capacity *']) !!}
                                        @if ($errors->has('confer_avail.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_avail.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('confer_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Conference Price *']) !!}
                                        @if ($errors->has('confer_price.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_price.0') }}</strong>
                                        </span>
                                        @endif

                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('confer_short_descr[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}
                                        @if ($errors->has('confer_short_descr.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_short_descr.0') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="col-md-2">
                                        {{ Form::file('confer_img[]', ['id' => 'acco_image', 'class' => 'file-styled', 'multiple' => false]) }}
                                        @if ($errors->has('confer_img.0'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_img.0') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <a href="javascript:void(0)" class="confer-add-more btn btn-success">Add More</a>
                            </div>

                            <div class="text-right">
                                <button type="submit" name="room" value="" class="btn btn-primary">Submit</button>
                            </div>


                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

                <!---Activity form--->
                <div class="tab-pane {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '3') ? 'in active' : '' }} fade has-padding" id="activity">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_activity',
                    'id' => 'frm_activity',
                    'url' => route('activity_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => false
                    )
                    )
                    !!}

                    <?php
                    $amenity_option = [];

                    if (!empty($arr_amenity) && count($arr_amenity) > 0) {
                        foreach ($arr_amenity as $amenity) {
                            $amenity_option[] = array(
                                'value' => $amenity->id,
                                'display' => $amenity->name,
                                'data-icon' => 'stumbleupon'
                            );
                        }
                    }


                    $activity_option = [];
                    if (!empty($arr_activity) && count($arr_activity) > 0) {

                        if (!empty($arr_activity) && count($arr_activity) > 0) {
                            foreach ($arr_activity as $actvity) {
                                $activity_option[] = array(
                                    'value' => $actvity->id,
                                    'display' => $actvity->name,
                                    'data-icon' => 'stumbleupon'
                                );
                            }
                        }
                    }

                    $surr = [];
                    $surr[] = array(
                        'value' => '',
                        'display' => 'Select Type of Attractoin *',
                        'data-icon' => 'stumbleupon'
                    );

                    if (!empty($arr_surr) && count($arr_surr) > 0) {
                        foreach ($arr_surr as $surrvalue) {
                            $surr[] = array(
                                'value' => $surrvalue->id,
                                'display' => $surrvalue->name,
                                'data-icon' => 'stumbleupon'
                            );
                        }
                    }


                    $shuttle_option = [];
                    $shuttle_option = array(array(
                            'value' => '',
                            'display' => 'Shuttle Service *',
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
                            <h5 class="panel-title">Activities</h5>
                        </div>
                        <div class="panel-body">


                            <div class="form-group">
                                <label class="col-lg-2 control-label">Amenity:</label>
                                <div class="col-lg-10">
                                    {!! Form::textarea('amenity_desc', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Amenity description *']) !!}
                                    @if ($errors->has('amenity_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('amenity_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Amenity on property:</label>
                                <div class="col-lg-10">
                                    {!! Form::multiselect('amenity_property[]', $amenity_option, null, ['class'=>'select-icons required', 'placeholder' => 'Select Amenity on Property *', 'data-placeholder' => "Select Amenity on property *", 'multiple' => 'multiple']) !!}

                                    @if ($errors->has('amenity_property'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('amenity_property') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Activity:</label>
                                <div class="col-lg-10">
                                    {!! Form::textarea('activity_desc', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Activity description *']) !!}
                                    @if ($errors->has('activity_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('activity_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-lg-2 control-label">Activity on Property :</label>
                                <div class="col-lg-10">
                                    {!! Form::multiselect('activity_property[]', $activity_option, null, ['class'=>'select-icons required', 'placeholder' => 'Select Activity on Property *', 'data-placeholder' => "Select Activity on property *", 'multiple' => 'multiple']) !!}
                                    @if ($errors->has('activity_property'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('activity_property') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group attract-parents">
                                <h5>Popular Attraction and surroundings: Please provide as many details as possible</h5>

                                <div class="col-md-4">

                                    {!! Form::text('attraction_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}

                                    @if ($errors->has('attraction_name.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('attraction_name.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-4">

                                    {!! Form::fancyselect('surrounding[]', $surr, null, ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('surrounding.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('surrounding.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-4">

                                    {!! Form::text('approx_dist[]', null, ['class' => 'form-control required', 'placeholder' => 'Approximate Distance *']) !!}
                                    @if ($errors->has('approx_dist.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('approx_dist.0') }}</strong>
                                    </span>
                                    @endif
                                </div>


                            </div>
                            <a href="javascript:void(0)" class="attract-add-more btn btn-success">Add More</a>

                            <div class="panel-heading">
                                <h6 class="panel-title">Transport</h6>
                            </div> 			

                            <div class="form-group">
                                <label class="col-lg-8 control-label">Transport / Shuttle Service</label>
                                <div class="col-lg-12">
                                    {!! Form::fancyselect('shuttle', $shuttle_option, null, ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('shuttle'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('shuttle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                            </div>

                            <div class="text-right">
                                <button type="submit" name="activity" value="" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

                <!---policy form--->
                <div class="tab-pane {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '4') ? 'in active' : '' }} fade has-padding" id="policy">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_policy',
                    'id' => 'frm_policy',
                    'url' => route('policy_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}
                    
                    <?php
                    
                    $payment_option = [];

                    if (!empty($arr_payment) && count($arr_payment) > 0) {
                        foreach ($arr_payment as $payment) {
                            $payment_option[] = array(
                                'value' => $payment->id,
                                'display' => $payment->name,
                                'data-icon' => 'stumbleupon'
                            );
                        }
                    }
                    
                    $acco_option = [];
                    $acco_option = array(array(
                            'value' => '',
                            'display' => 'Select Duration of Accommodation *',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'long_term',
                            'display' => 'Long Term',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'short_term',
                            'display' => 'Short Term',
                            'data-icon' => 'stumbleupon'
                        ),
                        array(
                            'value' => 'long_short_term',
                            'display' => 'Long & short term',
                            'data-icon' => 'stumbleupon'
                        )
                    );


                    $corporate_option = [];
                    $corporate_option = array(array(
                            'value' => '',
                            'display' => 'Select Corporate Deals *',
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
                    
                    $contractor_option = [];
                    $contractor_option = array(array(
                            'value' => '',
                            'display' => 'Select Contractors Deals *',
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
                    
                    $extra_option = [];
                    $extra_option = array(array(
                            'value' => '',
                            'display' => 'Select Extra Condition *',
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
                            <h5 class="panel-title">Policies</h5>
                        </div>
                        <div class="panel-body">


                            <div class="form-group extra-parents">

                                <div class="col-lg-6">
                                    {!! Form::text('deposite', config('constants.policy')['policy_share'].'% Deposit', ['class' => 'form-control required', 'readonly' => 'true']) !!}
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('cancel', null, ['class' => 'form-control required', 'placeholder' => 'Enter Cancellation Policy *']) !!}
                                    @if ($errors->has('cancel'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('cancel') }}</strong>
                                    </span>
                                    @endif
                                    
                                </div>
                            </div>

                            <h6> 
                                {{ config('constants.policy')['desc'] }}
                                
                            </h6>

                            <div class="form-group">

                                <div class="col-lg-6">
                                    {!! Form::text('timein', null, ['class' => 'form-control required', 'placeholder' => 'Enter Time In *']) !!}
                                    @if ($errors->has('timein'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('timein') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('timeout', null, ['class' => 'form-control required', 'placeholder' => 'Enter Time Out *']) !!}
                                    @if ($errors->has('timeout'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('timeout') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-lg-6">
                                    {!! Form::text('child_extra', null, ['class' => 'form-control', 'placeholder' => 'Children & Extra']) !!}
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('pets', null, ['class' => 'form-control', 'placeholder' => 'Pets']) !!}
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-lg-6">
                                    {!! Form::multiselect('payment_type[]', $payment_option, null, ['class'=>'select-icons required', 'placeholder' => 'Payment accepted at this facility *', 'data-placeholder' => "Payment accepted at this facility *", 'multiple' => 'multiple']) !!}
                                    @if ($errors->has('payment_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('payment_type') }}</strong>
                                    </span>
                                    @endif
                                </div>


                                <div class="col-lg-6">
                                    {!! Form::text('lang_spoken', null, ['class' => 'form-control', 'placeholder' => 'Language Spoken At Facility']) !!}
                                    
                                </div>
                            </div>

                            <div class="form-group">
                                
                                <div class="col-lg-4">
                                    {!! Form::fancyselect('acco_duration', $acco_option, null, ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('acco_duration'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('acco_duration') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('corpo_deals', $corporate_option, null, ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('corpo_deals'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('corpo_deals') }}</strong>
                                    </span>
                                    @endif
                                    
                                </div>

                                <div class="col-lg-4">
                                    {!! Form::fancyselect('contract_deal', $contractor_option, null, ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('contract_deal'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('contract_deal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-lg-3 control-label">Your  Terms</label>
                                <div class="col-lg-9">
                                    {!! Form::textarea('policy_terms', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Enter your Terms *']) !!}
                                    @if ($errors->has('policy_terms'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('policy_terms') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>


                            <h5>Do you offer extra's ( Example:Flower )</h5>			   

                            <div class="form-group extra-parents">

                                <div class="col-md-3">
                                    {!! Form::text('item[]', null, ['class' => 'form-control required', 'placeholder' => 'Item Name *']) !!}
                                    @if ($errors->has('item.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('item.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-3">
                                    {!! Form::text('extra_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Enter Price *']) !!}
                                    @if ($errors->has('extra_price.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('extra_price.0') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                
                                <div class="col-md-3">
                                    {!! Form::fancyselect('extra_cond[]', $extra_option, null, ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('extra_cond.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('extra_cond.0') }}</strong>
                                    </span>
                                    @endif
                                   
                                </div>

                                <div class="col-md-3">
                                    {{ Form::file('extra_img[]', ['id' => 'extra_img', 'class' => 'file-styled', 'multiple' => false]) }}
                                    {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                                </div>
                            </div>

                            <a href="javascript:void(0)" class='btn btn-success extra-add-more'>Add</a>
                        
                        
                        <div class="text-right">
                            <button type="submit" name="policy" value="" class="btn btn-primary">Submit</button>
                        </div>
                            </div>
                </div>
                    {!! Form::close() !!}
                </div>

                <!---meta tag form--->
                <div class="tab-pane fade {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '5') ? 'in active' : '' }} has-padding" id="keywords">
                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_meta',
                    'id' => 'frm_meta',
                    'url' => route('metatag_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title">Keywords & Metatags</h5>
                            </div>
                            
                            <div class="panel-body">

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Title:</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('title', null, ['class' => 'form-control required', 'placeholder' => 'Enter Your Title *']) !!}
                                        @if ($errors->has('title'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Keywords:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('keyword', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Enter your Keywords here *']) !!}
                                        @if ($errors->has('keyword'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('keyword') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Meta Tags:</label>
                                    <div class="col-lg-9">
                                        {!! Form::textarea('meta_desc', null, ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Enter your Meta Tags here *']) !!}
                                        @if ($errors->has('meta_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('meta_desc') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                    {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit </button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

                <!---video & map form--->
                <div class="tab-pane fade has-padding {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '6') ? 'in active' : '' }}" id="videomap">
                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_video',
                    'id' => 'frm_video',
                    'url' => route('video_map_detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => true
                    )
                    )
                    !!}
                    
                    
                    <?php 
                    $video_option = [];
                    $video_option = array(array(
                            'value' => '',
                            'display' => 'Choose Here',
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
                                <h5 class="panel-title">Video and Map</h5>
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label class="col-lg-6 control-label">Do you have any video link :</label>
                                    <div class="col-lg-12">
                                        {!! Form::fancyselect('video_cond', $video_option, null, ['id'=>'vid_con', 'class'=>'select-icons required']) !!}
                                    </div>
                                </div>


                                <div class="form-group" id="viddiv" style='display:none;'>
                                    <label class="col-lg-3 control-label">Accommodation Video </label>
                                    <div class="col-lg-9">
                                        {!! Form::text('video_link', null, ['class' => 'form-control required url', 'placeholder' => 'Paste Your Accommodation Link here *']) !!}
                                        @if ($errors->has('video_link'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('video_link') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <h4> Location</h4>							

                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Latitude:</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('lat', null, ['class' => 'form-control required latCoord', 'placeholder' => 'Enter Latitude *']) !!}
                                        @if ($errors->has('lat'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('lat') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 control-label">Longitude:</label>
                                    <div class="col-lg-9">
                                        {!! Form::text('long', null, ['class' => 'form-control required longCoord', 'placeholder' => 'Enter Longitude *']) !!}
                                        @if ($errors->has('long'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('long') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                    {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                                </div>


                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit </button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>

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

<script type="text/javascript">
            //////////////////////////room add more////////////////////////
            var room_temp = '<div class="form-group parentss">'+
            
            '<div class="col-md-2">'+
           '{!! Form::fancyselect('room_type[]', $room_type, null, ['class'=>'form-control required select-icons']) !!}</div>'+
           
            '<div class="col-md-2">'+
            '{!! Form::fancyselect('guest[]', $room_cap, null, ['class'=>'form-control required select-icons']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{!! Form::text('room_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Room Available *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Room Price *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_short_desc[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('room_img[]', ['id' => 'room_img', 'class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="btn-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".btn-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(room_temp)
        });
        
        $(document).on('click','.btn-remove',function(e){    
                e.preventDefault();
                $(this).parents(".parentss").remove();
        });
        
        
        //////////////////////////venu add more////////////////////////
        var venu_temp = '<div class="form-group venu-parents">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('venue_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Venue Name *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('venue_capacity[]', null, ['class' => 'form-control required', 'placeholder' => 'Capacity *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venue_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Venue Price *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venue_short_descr[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('venue_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="venu-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".venu-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(venu_temp)
        });
        
        $(document).on('click','.venu-remove',function(e){    
                e.preventDefault();
                $(this).parents(".venu-parents").remove();
        });
        
        //////////////////////////conference add more////////////////////////
        var confer_temp = '<div class="form-group confer-parents">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('confer_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Conference Name *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('confer_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Capacity *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Conference Price *']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_short_descr[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('confer_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="confer-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".confer-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(confer_temp)
        });
        
        $(document).on('click','.confer-remove',function(e){    
                e.preventDefault();
                $(this).parents(".confer-parents").remove();
        });


        //////////////////////////attraction add more////////////////////////
        var attract_temp = '<div class="form-group attract-parents">'+
                
            '<div class="col-md-4">'+
            '{!! Form::text('attraction_name[]', null, ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-4">'+
            '{!! Form::fancyselect('surrounding[]', $surr, null, ['class'=>'form-control select-icons required']) !!}'+
            '</div>'+
    
            '<div class="col-md-4">'+
            '{!! Form::text('approx_dist[]', null, ['class' => 'form-control required', 'placeholder' => 'Approximate Distance *']) !!}'+
            '</div>'+
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="attract-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".attract-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(attract_temp)
        });
        
        $(document).on('click','.attract-remove',function(e){    
                e.preventDefault();
                $(this).parents(".attract-parents").remove();
        });
        
        //////////////////////////extra offer add more////////////////////////
        var extra_temp = '<div class="form-group extra-parents">'+
                
            '<div class="col-md-3">'+
            '{!! Form::text('item[]', null, ['class' => 'form-control required', 'placeholder' => 'Item *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-3">'+
            '{!! Form::text('extra_price[]', null, ['class' => 'form-control required number', 'placeholder' => 'Enter Price *']) !!}'+
            '</div>'+
    
            '<div class="col-md-3">'+
            '{!! Form::fancyselect('extra_cond[]', $extra_option, null, ['class'=>'form-control select-icons required']) !!}'+
            '</div>'+
            
            '<div class="col-md-3">'+
            '{{ Form::file('extra_img[]', ['id' => 'extra_img', 'class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            
            '<a href="javascript:void(0)" style="margin: 9px 0px 0px 10px;" class="extra-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".extra-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(extra_temp)
        });
        
        $(document).on('click','.extra-remove',function(e){    
                e.preventDefault();
                $(this).parents(".extra-parents").remove();
        });
        
    
        $(document).ready(function () {

            $('#cv').css("display", "none");

            var befco = $('#condit').val();

            if (befco == 'Y') {

                $('#cv').css("display", "block");
                $('.both').css("display", "block");
            } else {

                $('#cv').css("display", "none");
                $('.both').css("display", "none");
            }


            $('#condit').change(function () {

                var co = $('#condit').val();

                if (co == 'Y') {
                    $('#cv').css("display", "block");
                    $('.both').css("display", "block");
                } else {
                    $('#cv').css("display", "none");
                    $('.both').css("display", "none");

                }
            });

            var bm = $('#vid_con').val();
            if (bm == 'Y') {
                $('#viddiv').css("display", "block");
            }

            $('#vid_con').change(function () {
                var conn2 = $('#vid_con').val();

                if (conn2 == 'Y') {
                    $('#viddiv').show();

                } else {
                    $('#viddiv').hide();
                }


            });
        });
    </script>
    
@endsection