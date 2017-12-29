@extends('admin.paymentmodelist.create', ['edit_data' => $edit_data])
@section('editName')
@section('editMethod')
{{ method_field('PUT') }}
@endsection

@section('pageTitle')
Edit Payment Mode
@endsection