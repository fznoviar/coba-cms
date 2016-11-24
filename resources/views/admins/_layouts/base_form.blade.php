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
                            @yield('form-fields')
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