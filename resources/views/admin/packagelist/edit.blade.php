@extends('admin.packagelist.create', ['edit_data' => $edit_data])
@section('editName')
@section('editMethod')
{{ method_field('PUT') }}
@endsection

@section('pageTitle')
Edit Package
@endsection