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
                                    {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}

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
                <div class="tab-pane {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '2') ? 'in active' : '' }} fade has-padding" id="rooms">

                    {!!
                    Form::open(
                    array(
                    'name' => 'frm_room',
                    'id' => 'frm_room',
                    'url' => route('room-detail'),
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
                                    {!! Form::textarea('room_desc', (isset($edit_data) && !empty($edit_data) ? $edit_data->room_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a description about your Accommodation *']) !!}
                                    @if ($errors->has('room_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group parentss">

                                <div class="col-md-2">

                                    {{-- Form::select('room_type[]',[''=>'Select type of Room']+@$arr_room->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['class'=>'select-icons']) --}}

                                    <?php
                                    $room_type = [];
                                    $room_type[] = array(
                                        'value' => '',
                                        'display' => 'Select Type of Room *',
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
                                    {!! Form::fancyselect('room_type[]', $room_type, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('room_type.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_type.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">

                                    {!! Form::fancyselect('guest[]', $room_cap, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('guest.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('guest.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">

                                    {!! Form::text('room_avail[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Room Available *']) !!}
                                    @if ($errors->has('room_avail.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_avail.0') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="col-md-2">
                                    {!! Form::text('room_price[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Room Price *']) !!}
                                    @if ($errors->has('room_price.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_price.0') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('room_short_desc[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}
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


                                        {!! Form::textarea('venu_desc', (isset($edit_data) && !empty($edit_data) ? $edit_data->venu_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a description about your Venue facility']) !!}
                                        @if ($errors->has('venu_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venu_desc') }}</strong>
                                        </span>
                                        @endif

                                    </div>
                                </div>	

                                <div class="form-group venu-parents">

                                    <div class="col-md-2">

                                        {!! Form::text('venue_name[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Venue Name']) !!}
                                        @if ($errors->has('venue_name'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">

                                        {!! Form::text('venue_avail[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Capacity']) !!}
                                        @if ($errors->has('venue_avail'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_avail') }}</strong>
                                        </span>
                                        @endif



                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('venue_price[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Venu Price']) !!}
                                        @if ($errors->has('venue_price'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_price') }}</strong>
                                        </span>
                                        @endif

                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('venue_descr[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Venue Short Description']) !!}
                                        @if ($errors->has('venue_descr'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_descr') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="col-md-2">
                                        {{ Form::file('venue_img[]', ['id' => 'acco_image', 'class' => 'file-styled', 'multiple' => false]) }}
                                        @if ($errors->has('venue_img'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('venue_img') }}</strong>
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
                                        {!! Form::textarea('confer_desc', (isset($edit_data) && !empty($edit_data) ? $edit_data->venu_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control', 'placeholder' => 'Give a description about your Conference facility']) !!}
                                        @if ($errors->has('confer_desc'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_desc') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group confer-parents">

                                    <div class="col-md-2">

                                        {!! Form::text('confer_name[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Conference Name']) !!}
                                        @if ($errors->has('confer_name'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <div class="col-md-2">

                                        {!! Form::text('confer_avail[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Capacity']) !!}
                                        @if ($errors->has('confer_avail'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_avail') }}</strong>
                                        </span>
                                        @endif
                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('confer_price[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Conference Price']) !!}
                                        @if ($errors->has('confer_price'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_price') }}</strong>
                                        </span>
                                        @endif

                                    </div>


                                    <div class="col-md-2">
                                        {!! Form::text('confer_short_descr[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control', 'placeholder' => 'Conference Short Description']) !!}
                                        @if ($errors->has('confer_short_descr'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_short_descr') }}</strong>
                                        </span>
                                        @endif

                                    </div>

                                    <div class="col-md-2">
                                        {{ Form::file('confer_img[]', ['id' => 'acco_image', 'class' => 'file-styled', 'multiple' => false]) }}
                                        @if ($errors->has('confer_img'))
                                        <span class="help-block" style = "display:block;color:red;">
                                            <strong>{{ $errors->first('confer_img') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <a href="javascript:void(0)" class="confer-add-more btn btn-success">Add More</a>
                            </div>

                            <div class="text-right">
                                <button type="submit" name="acco" value="room" class="btn btn-primary">Submit</button>
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
                    'url' => route('activity-detail'),
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
                                    {!! Form::textarea('amenity_desc', (isset($edit_data) && !empty($edit_data) ? $edit_data->amenity : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Amenity description *']) !!}
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
                                    {!! Form::multiselect('amenity_property[]', $amenity_option, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons required', 'placeholder' => 'Select Amenity on Property *', 'data-placeholder' => "Select Amenity on property", 'multiple' => 'multiple']) !!}

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
                                    {!! Form::textarea('activity_desc', (isset($edit_data) && !empty($edit_data) ? $edit_data->room_desc : ''), ['rows' => 5, 'cols' => 5, 'class' => 'form-control required', 'placeholder' => 'Activity description *']) !!}
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
                                    {!! Form::multiselect('activity_property[]', $activity_option, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons required', 'placeholder' => 'Select Activity on Property *', 'data-placeholder' => "Select Activity on property", 'multiple' => 'multiple']) !!}
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

                                    {!! Form::text('attraction_name[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}

                                    @if ($errors->has('attraction_name.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('attraction_name.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-4">

                                    {!! Form::fancyselect('surrounding[]', $surr, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('surrounding.0'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('surrounding.0') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-4">

                                    {!! Form::text('approx_dist[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Approximate Distance *']) !!}
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
                                    {!! Form::fancyselect('shuttle', $shuttle_option, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons required']) !!}
                                    @if ($errors->has('shuttle'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('shuttle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                {{ Form::input('hidden', 'type', 'A', ['readonly' => 'readonly']) }}
                            </div>

                            <div class="text-right">
                                <button type="submit" name="acco" value="room" class="btn btn-primary">Submit</button>
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
                    'url' => route('activity-detail'),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'files' => false
                    )
                    )
                    !!}

                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Policies</h5>
                        </div>
                        <div class="panel-body">


                            <div class="form-group">
                                <label class="col-lg-1 control-label">Amenity:</label>
                                <div class="col-lg-9">
                                    {!! Form::textarea('room_desc[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->room_desc : ''), ['rows' => 3, 'cols' => 3, 'class' => 'form-control required', 'placeholder' => 'Give a description about your Accommodation *']) !!}
                                    @if ($errors->has('room_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_desc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group parentss">

                                <div class="col-md-2">

                                    {{-- Form::select('room_type[]',[''=>'Select type of Room']+@$arr_room->pluck('name','id')->toArray(), (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''),['class'=>'select-icons']) --}}

                                    <?php
                                    $room_type = [];
                                    $room_type[] = array(
                                        'value' => '',
                                        'display' => 'Select Type of Room *',
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
                                    {!! Form::fancyselect('room_type[]', $room_type, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('room_type'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_type') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">

                                    {!! Form::fancyselect('guest[]', $room_cap, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'select-icons required']) !!}

                                    @if ($errors->has('guest'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('guest') }}</strong>
                                    </span>
                                    @endif

                                </div>

                                <div class="col-md-2">

                                    {!! Form::text('room_avail[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Room Available *']) !!}
                                    @if ($errors->has('room_avail'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_avail') }}</strong>
                                    </span>
                                    @endif
                                </div>



                                <div class="col-md-2">
                                    {!! Form::text('room_price[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Room Price *']) !!}
                                    @if ($errors->has('room_price'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_price') }}</strong>
                                    </span>
                                    @endif
                                </div>

                                <div class="col-md-2">
                                    {!! Form::text('room_short_desc[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Short Description *']) !!}
                                    @if ($errors->has('room_short_desc'))
                                    <span class="help-block" style = "display:block;color:red;">
                                        <strong>{{ $errors->first('room_short_desc') }}</strong>
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



                            <div class="text-right">
                                <button type="submit" name="acco" value="room" class="btn btn-primary">Submit</button>
                            </div>


                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>

                <!---meta tag form--->
                <div class="tab-pane fade {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '5') ? 'in active' : '' }} has-padding" id="keywords">
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
                <div class="tab-pane fade has-padding {{ (!empty(session()->get('tab_type')) && session()->get('tab_type') == '6') ? 'in active' : '' }}" id="videomap">
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
            var room_temp = '<div class="form-group parentss">'+
            
            '<div class="col-md-2">'+
           '{!! Form::fancyselect('room_type[]', $room_type, null, ['class'=>'form-control required select-icons']) !!}</div>'+
           
            '<div class="col-md-2">'+
            '{!! Form::fancyselect('guest[]', $room_cap, null, ['class'=>'form-control required select-icons']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{!! Form::text('room_avail[]', null, ['class' => 'form-control required', 'placeholder' => 'Room Available']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_price[]', null, ['class' => 'form-control required', 'placeholder' => 'Room Price']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('room_short_desc[]', null, ['class' => 'form-control required', 'placeholder' => 'Short Description']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('room_img[]', ['id' => 'room_img', 'class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" class="btn-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".btn-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(room_temp)
        });
        
        $(document).on('click','.btn-remove',function(e){    
                e.preventDefault();
                $(this).parents(".parentss").remove();
        });

</script>

<script>
    
        var venu_temp = '<div class="form-group venu-parents">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('venu_name[]', null, ['class' => 'form-control', 'placeholder' => 'Venu Name']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('venu_avail[]', null, ['class' => 'form-control', 'placeholder' => 'Capacity']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venu_price[]', null, ['class' => 'form-control', 'placeholder' => 'Venu Price']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('venu_short_desc[]', null, ['class' => 'form-control', 'placeholder' => 'Venu Short Description']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('venu_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" class="venu-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".venu-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(venu_temp)
        });
        
        $(document).on('click','.venu-remove',function(e){    
                e.preventDefault();
                $(this).parents(".venu-parents").remove();
        });
</script>	

<script>
    
    
    var confer_temp = '<div class="form-group confer-parents">'+
                
            '<div class="col-md-2">'+
            '{!! Form::text('confer_name[]', null, ['class' => 'form-control', 'placeholder' => 'Conference Name']) !!}'+
            '</div>'+    
            
            '<div class="col-md-2">'+
            '{!! Form::text('confer_avail[]', null, ['class' => 'form-control', 'placeholder' => 'Capacity']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_price[]', null, ['class' => 'form-control', 'placeholder' => 'Conference Price']) !!}'+
            '</div>'+
    
            '<div class="col-md-2">'+
            '{!! Form::text('confer_short_desc[]', null, ['class' => 'form-control', 'placeholder' => 'Conference Short Description']) !!}'+
            '</div>'+
            
            '<div class="col-md-2">'+
            '{{ Form::file('confer_img[]', ['class' => 'form-control file-styled', 'multiple' => false]) }}'+
            '</div>'+
            '<a href="javascript:void(0)" class="confer-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".confer-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(confer_temp)
        });
        
        $(document).on('click','.confer-remove',function(e){    
                e.preventDefault();
                $(this).parents(".confer-parents").remove();
        });
</script>

<script>
    
    var attract_temp = '<div class="form-group attract-parents">'+
                
            '<div class="col-md-4">'+
            '{!! Form::text('attraction_name[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Name of Attraction *']) !!}'+
            '</div>'+    
            
            '<div class="col-md-4">'+
            '{!! Form::fancyselect('surrounding[]', $surr, (isset($edit_data) && !empty($edit_data) ? @$edit_data->id : ''), ['class'=>'form-control select-icons required']) !!}'+
            '</div>'+
    
            '<div class="col-md-4">'+
            '{!! Form::text('approx_dist[]', (isset($edit_data) && !empty($edit_data) ? $edit_data->alternate_no : ''), ['class' => 'form-control required', 'placeholder' => 'Approximate Distance *']) !!}'+
            '</div>'+
            '<a href="javascript:void(0)" class="attract-remove label label-danger">Remove</a>'+
            '</div>';
    
        $(".attract-add-more").on('click', function(e){
            e.preventDefault();
            $(this).before(attract_temp)
        });
        
        $(document).on('click','.attract-remove',function(e){    
                e.preventDefault();
                $(this).parents(".attract-parents").remove();
        });

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


@endsection