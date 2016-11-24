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

                                {!! Form::cmsStatic('Static Control', 'email@example.com') !!}

                                {!! Form::cmsSelect('select', 'Select With Placeholder', ['Select 1', 'Select 2'], 'Select option') !!}

                                {!! Form::cmsMultiSelect('multiselect[]', 'Multiselect', [ 1=>'Select 1', 2=>'Select 2', 'Group' => [3=>'Select 3', 4=>'Select 4']])!!}

                                {!! Form::cmsRadio('radio', 'Radio Buttons', [11 => 'Select 1', 12 => 'Select 2']) !!}

                                {!! Form::cmsCheckboxes('checkbox', 'Checkboxes', [11 => 'Select 1', 12 => 'Select 2']) !!}

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-md-2">File Input</label>
                                        <div class="col-md-10">
                                            <input type="file">
                                        </div>
                                    </div>
                                </div>

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
@endsection