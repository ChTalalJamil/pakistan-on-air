<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">{{Auth::user()->name}}</div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                    </div>
                </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <!-- <li class="nav-header">Navigation</li> -->
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                    <!-- <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v1</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v2</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Dashboard v3</p>
                                    </a>
                                </li>
                            </ul> -->
                </li>
                <li class="nav-header">Modules</li>
                <!-- <li class="nav-item">
                    <a href="/admin/leads-list" class="nav-link">
                        <i class="nav-icon ion ion-stats-bars"></i>
                        <p>
                            Leads
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="/admin/category" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/video" class="nav-link">
                        <i class="nav-icon fas fa-film"></i>
                        <p>
                            Video
                        </p>
                    </a>
                </li>

                <!-- <li class="nav-item">
                    <a href="/admin/campaign-list" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Campaign
                        </p>
                    </a>
                </li> -->

                <!-- <li class="nav-item">
                                <a href="pages/kanban.html" class="nav-link">
                                <i class="nav-icon fas fa-columns"></i>
                                <p>
                                    Kanban Board
                                </p>
                                </a>
                            </li> -->
                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>To Do's</p>
                                    </a>
                                </li> -->

                <!-- <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Chat</p>
                                    </a>
                                </li> -->
                <!-- <li class="nav-item">
                                <a href="" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Documentation</p>
                                </a>
                            </li> -->

            </ul>

        </nav>
        <nav style="bottom: 0px;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/logout" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>