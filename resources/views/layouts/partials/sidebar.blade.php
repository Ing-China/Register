<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.users') }}" class="brand-link">
        <img src="{{ asset('asset-admin') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin System</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.users') }}"
                        class="nav-link {{ Request::route()->getName() == 'admin.users' ? 'active' : '' }}">
                        <i class="fa-solid fa-users" style="color: #ffffff;"></i>
                        <p>
                            Manage User
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.product') }}"
                        class="nav-link {{ Request::route()->getName() == 'admin.product' ? 'active' : '' }}">
                        <i class="fa-solid fa-bag-shopping" style="color: #ffffff;"></i>
                        <p>
                            Product Manage
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.category') }}"
                        class="nav-link {{ Request::route()->getName() == 'admin.category' ? 'active' : '' }}">
                        <i class="fa-solid fa-list" style="color: #ffffff;"></i>
                        <p>
                            Category Manage
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
