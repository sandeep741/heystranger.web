@extends('admin.app')
@section('content')

<div class="raw">
    <div class="heading-btn-group">
        <a href="{{ route('accommlist.create') }}" class="btn btn-success"><i class="icon-comment-discussion position-left"></i> Add New</a>
    </div>    
</div>

<br>

<div class="raw">

    <!-- Media library -->
    <div class="panel panel-white">
        <div class="panel-heading">
            <h6 class="panel-title text-semibold">My Accommodation</h6>
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
                    <th>Accommodation Name</th>
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
                    <td>{{ $data ? $data->created_at->diffForHumans() : '' }}</td>

                    <td class="text-center">
                        <ul class="icons-list">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li><a href="{{ route('accommlist.edit', ['id' => $data->id]) }}"><i class="icon-pencil7"></i> Edit file</a></li>
                                    <li><a href="#"><i class="icon-copy"></i> Copy file</a></li>
                                    <li><a href="#"><i class="icon-eye-blocked"></i> Unpublish</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#"><i class="icon-bin"></i> Move to trash</a></li>
                                </ul>
                            </li>
                        </ul>
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

</div>

@endsection

@section('pageTitle')
Accommodation
@endsection

@section('addtional_css')

@endsection

@section('jscript')
<script type="text/javascript" src="{{ asset('/assets/admin/js/select2.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/uniform.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('/assets/admin/js/form_layouts.js') }}"></script>
@endsection