<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-list">
                <span class="sidebar-list-label">Overview</span>
            </li>
            <li>
                <a href="{{ route('backend.index') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li class="sidebar-list">
                <span class="sidebar-list-label">Guide</span>
            </li>
            <li>
                <a href="#"><i class="fa fa-th fa-fw"></i> Template<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('backend.template.index') }}">Index</a>
                    </li>
                    <li>
                        <a href="{{ route('backend.template.create') }}">Create</a>
                    </li>
                    <li>
                        <a href="{{ route('backend.template.edit') }}">Edit</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->