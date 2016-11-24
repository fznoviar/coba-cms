<!DOCTYPE html>
<html lang="en">

<head>
    @include('admins._partials.meta')
</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            {{-- Include header file --}}
            @include('admins._partials.header')

            @include('admins._partials.sidebar')
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    @yield('page-title', 'Dashboard')
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            @yield('main-content')
    </div>
    <!-- /#wrapper -->

    @include('admins._partials.script')

</body>

</html>
