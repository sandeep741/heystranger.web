@extends('admin.create', ['edit_data' => $edit_data])
@section('editName')
@section('editMethod')
{{ method_field('PUT') }}
@endsection