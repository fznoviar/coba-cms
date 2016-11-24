@extends('admins._layouts.base_form')

@section('page-title')
    <h1 class="page-header">{{ $page_name }}</h1>
@endsection

@section('page-sub-title')
    {{ $flg ? 'Edit' : 'New' }} {{ $page_name }}
@endsection