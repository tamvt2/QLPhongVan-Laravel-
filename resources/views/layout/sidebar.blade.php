<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/template/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @if( auth()->check() )
                    <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user"></i>
                        <p>
                            Người Phỏng Vấn
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/users/interview/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Người Phỏng Vấn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users/interview/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Người Phỏng Vấn</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p>
                            Ứng Viên
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/users/candidate/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Ứng Viên</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users/candidate/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Ứng Viên</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-diagnoses"></i>
                        <p>
                            Thể Loại
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/users/category/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Thể Loại</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/users/category/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Thể Loại</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-question"></i>
                        <p>
                            Câu Hỏi Phỏng Vấn
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/customers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Câu Hỏi Phỏng Vấn</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/customers" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Câu Hỏi Phỏng Vấn</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/customers" class="nav-link">
                        <i class="fas fa-user-cog"></i>
                        <p>Setup Câu Hỏi</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/customers" class="nav-link">
                    <i class="fas fa-list-ol"></i>
                        <p>Danh Sách Phỏng Vấn</p>
                    </a>
                </li>
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>