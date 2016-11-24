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

@section('form-fields')
    <form role="form">
        {!! Form::cmsText('nama', 'Nama', null, ['info' => 'Contoh text info tambahan']) !!}
        
        {!! Form::cmsPassword('password', 'Password') !!}

        {!! Form::cmsNumber('number', 'Number') !!}

        {!! Form::cmsTextarea('description', 'Description') !!}

        {!! Form::cmsWysiwyg('content', 'Content') !!}

        {!! Form::cmsStatic('Static Control', 'email@example.com') !!}

        {!! Form::cmsSelect('select', 'Select With Placeholder', ['Select 1', 'Select 2'], 'Select option') !!}

        {!! Form::cmsMultiSelect('multiselect[]', 'Multiselect', [ 1=>'Select 1', 2=>'Select 2', 'Group' => [3=>'Select 3', 4=>'Select 4']])!!}

        {!! Form::cmsRadio('radio', 'Radio Buttons', [11 => 'Select 1', 12 => 'Select 2']) !!}

        {!! Form::cmsCheckboxes('checkbox', 'Checkboxes', [11 => 'Select 1', 12 => 'Select 2']) !!}

        {!! Form::cmsFileBrowser('image', 'Image') !!}

        <div class="action-form">
            <div class="pull-right">
                {!! Form::cmsSubmit() !!}
                {!! Form::cmsPreview() !!}
                {!! Form::cmsReset() !!}
            </div>
        </div>
    </form>
@endsection