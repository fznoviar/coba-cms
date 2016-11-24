@extends('admins._layouts.base')

@section('page-css')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.css') }}" rel="stylesheet">
@endsection

@section('main-content')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @yield('page-sub-title') - Index
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            @yield('table-header')
                        </thead>
                        <tbody>
                            @yield('table-content')
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection

@section('page-script')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('assets/admin/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
@endsection