@extends('admin.app')
@section('content')


<div class="heading-btn-group">
    <a href="{{ route('surroundinglist.create') }}" class="btn btn-success"><i class="icon-comment-discussion position-left"></i> Add New</a>
</div>  
<br>

<!-- Media library -->
<div class="panel panel-white">
    <div class="panel-heading">
        <h6 class="panel-title text-semibold">My Surrounding</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>
    <table class="table table-striped media-library table-lg">
        <thead>
            <tr>
                <th>S.no</th>
                <th>Surrounding Name</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>

            @if(isset($datas) && !empty($datas) && count($datas) > 0)
            @foreach($datas as $key => $data)

            <tr>
                <td>{{ ($datas->currentpage()-1) * $datas->perpage() + $key + 1 }}</td>
                <td>{{ $data ? $data->name : '' }}</td>
                <td>{{ (isset($data) && !empty($data) && ($data->status == '1')) ? 'Active' : 'Inactive' }}</td>
                <td>{{ $data ? $data->updated_at->diffForHumans() : '' }}</td>

                <td class="text-center">
                    <ul class="icons-list">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-menu9"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="{{ route('surroundinglist.edit', ['id' => $data->id]) }}"><i class="icon-pencil7"></i> Edit file</a></li>
                                <li><a href="" onclick="event.preventDefault();
                                            document.getElementById('update-form-{{ $data->id }}').submit();"><i class="icon-eye{{ (($data->status == 1) ? "-blocked" : '') }}"></i> {{ (($data->status == 1) ? "Unpublish" : "publish") }}</a></li>
                                <li class="divider"></li>
                                <li><a href="" id="{{ $data->id }}" class="delete-record"><i class="icon-bin"></i> Delete</a></li>
                            </ul>
                        </li>
                    </ul>

                    {!!
                    Form::open(
                    array(
                    'name' => 'delete-form',
                    'id' => 'delete-form-'.$data->id,
                    'url' => 'surroundinglist/'.(isset($data) && !empty($data) ? $data->id : ''),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'style' => 'display:none',
                    'files' => false
                    )
                    )
                    !!}
                    {{ method_field('DELETE') }}

                    {!! Form::close() !!}

                    {!!
                    Form::open(
                    array(
                    'name' => 'update-form',
                    'id' => 'update-form-'.$data->id,
                    'url' => 'surroundinglist/'.(isset($data) && !empty($data) ? $data->id : ''),
                    'autocomplete' => 'off',
                    'class' => 'form-horizontal',
                    'style' => 'display:none',
                    'files' => false
                    )
                    )
                    !!}
                    {{ method_field('PUT') }}
                    {{ Form::input('hidden', 'status', (isset($data) && !empty($data) && $data->status == 1 ? '0' : '1'), ['readonly' => 'readonly']) }}

                    {!! Form::close() !!}


                </td>
            </tr>
            @endforeach

            @else
            <tr>
                <td colspan="5" align="center"><span class="label label-danger">No Record Found</span></td>
            </tr>
            @endif

            <tr>
                <td colspan="5" align="center"> {{ $datas->render() }} </td>
            </tr>
        </tbody>

    </table>
</div>


@endsection

@section('pageTitle')
Surrounding List
@endsection

@section('addtional_css')

@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/form_layouts.js') }}"></script>
@endsection