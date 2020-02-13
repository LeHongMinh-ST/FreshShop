<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('backend.dashboard')}}" class="brand-link">
        <img src="{{asset('backend/dist/img/logo.jpg')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Freshshop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar ">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex dropdown">
            <div class="image">
                <img src="{{asset('backend/dist/img/user/avatar').'/'. Auth::user()->avatar }}"
                     class="img-circle elevation-2"
                     alt="User Image">

            </div>
            <div class="info">
                <a href="{{route('User.show',Auth::user()->id)}}" class="d-block">{{Auth::user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="./index.html" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>

                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right">6</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Product.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Product.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Sale.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách khuyến mãi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Product.trashed')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách tạm gỡ</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Quản lý danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Category.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Category.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Category.trashed')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách tạm gỡ</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Quản lý đơn đặt hàng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Bán ra
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Danh sách</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Nhập vào
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Tạo đơn nhập</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Danh sách đơn</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Quản lý khách hàng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Customer.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Customer.trashed')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách tạm khóa</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Quản lý nhà cung cấp
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Supplier.create')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Supplier.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        @can('viewAny',Auth::user())
                            <li class="nav-item">
                                <a href="{{route('Supplier.trashed')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách đã gỡ</p>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>


                @can('viewAny',Auth::user())
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Quản lý nhân viên
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('User.create')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('User.index')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('User.trashed')}}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Danh sách tạm khóa</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan

                <li class="nav-item has-treeview">
                    <a href="{{route('Warehouse.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Kho hàng
                        </p>
                    </a>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
