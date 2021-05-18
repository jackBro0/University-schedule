<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('index')}}" class="brand-link">
        <!-- <img src="../dist/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
              style="opacity: .8">-->
        <span class="brand-text font-weight-light">Schedules lists</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Create schedule</li>
                <li class="nav-item has-treeview">
                    <a href="{{route('schedule.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Create schedule
                        </p>
                    </a>
                </li>


                <!--Управление-->
                <li class="nav-header">Teachers list</li>
                <li class="nav-item has-treeview">
                    <a href="{{route('teacher.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Teachers list
                        </p>
                    </a>
                </li>
                <li class="nav-header">Subjects list</li>
                <li class="nav-item has-treeview">
                    <a href="{{route('subject.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Subjects list
                        </p>
                    </a>
                </li>
                <li class="nav-header">Groups list</li>
                <li class="nav-item has-treeview">
                    <a href="{{route('group.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Groups list
                        </p>
                    </a>
                </li>
                <li class="nav-header">Auditories list</li>
                <li class="nav-item has-treeview">
                    <a href="{{route('auditory.create')}}" class="nav-link">
                        <i class="nav-icon fas fa-folder-open"></i>
                        <p>
                            Auditories list
                        </p>
                    </a>
                </li>
                <br>
                <br>

            </ul>
        </nav>

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
