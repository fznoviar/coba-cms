@extends('admins._layouts.base_form')

@section('page-title')
    <div class="page-header">
        <h1>{{ $page_name }}</h1>
        <a href="{{ route($routePrefix . '.index') }}" class="btn btn-default pull-right"><i class="fa fa-arrow-left"></i> Back to Index</a>
    </div>
@endsection

@section('page-sub-title')
    {{ $flg ? 'Edit' : 'New' }} {{ $page_name }}
@endsection

@section('form-fields')
    @if ($flg)
        {!! Form::cmsModel($user, ['prefix' => $routePrefix]) !!}
    @else
        {!! Form::cmsOpen(['route' => $routePrefix . '.store', 'method' => 'POST']) !!}
    @endif
        {!! Form::cmsText('first_name', 'First Name') !!}
        
        {!! Form::cmsText('last_name', 'Last Name') !!}
        
        {!! Form::cmsEmail('email', 'Email', null, $flg ? ['disabled'] : []) !!}
        
        {!! Form::cmsPassword('password', 'Password') !!}
        
        {!! Form::cmsPassword('password_confirmation', 'Password Confirmation') !!}

        {!! Form::cmsCheckboxes('is_superuser', 'Permission', [1 => 'Superuser']) !!}

        {!! Form::cmsCheckboxes('is_active', 'Status', [1 => 'Active']) !!}

        <div class="action-form">
            <div class="pull-right">
                {!! Form::cmsSubmit() !!}
                {!! Form::cmsReset() !!}
            </div>
        </div>
    {!! Form::close() !!}
@endsection