@extends('admins._layouts.base')

@section('page-css')
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @yield('page-sub-title')
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
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
                        </div>
                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('page-script')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{ asset('assets/admin/script/tinymce.js') }}"></script>

    <script>
    jQuery(document).ready(function() {
        TinyMCE.init(); 
    });
    </script>
@endsection