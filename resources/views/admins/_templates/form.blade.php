@extends('admins._layouts.base_form')

@section('page-title')
    <div class="page-header">
        <h1>{{ $page_name }}</h1>
        <a href="#" class="btn btn-default pull-right">Back to Index</a>
    </div>
@endsection

@section('page-sub-title')
    {{ $flg ? 'Edit' : 'New' }} {{ $page_name }}
@endsection