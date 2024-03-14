<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('dist/img/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div style="color: #fff;" class="info">{{ Auth::user()->name }}</div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Modules</li>

                @if ( Auth::user()->role_id == 1)

                <li class="nav-item">
                    <a href="{{ route('get.terms') }}" class="nav-link">
                        <i class="nav-icon ion ion-videocamera"></i>
                        <p>
                            Terms and Conditions
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('get.policies') }}" class="nav-link">
                        <i class="nav-icon ion ion-videocamera"></i>
                        <p>
                            Policies
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('get.categories') }}" class="nav-link">
                        <i class="nav-icon ion ion-videocamera"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('get.videos') }}" class="nav-link">
                        <i class="nav-icon ion ion-film-marker"></i>
                        <p>
                            Video
                        </p>
                    </a>
                </li>

            </ul>

        </nav>
        <nav style="bottom: 0px;">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.logout') }}" class="nav-link">
                        <i class="nav-icon ion ion-log-out"></i>
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