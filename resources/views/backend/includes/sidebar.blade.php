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
                <img src="{{asset('storage/images/user/avatar').'/'. Auth::user()->avatar }}"
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
                <li class="nav-item has-treeview ">
                    <a href="{{route('backend.dashboard')}}"
                       class="nav-link {{ (request()->is('admin') || request()->is('admin/dashboard')) ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Bảng điều kiển
                        </p>
                    </a>

                </li>
                <li class="nav-header">Sản phẩm</li>
                <li class="nav-item has-treeview {{ request()->is('admin/Product*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ request()->is('admin/Product*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>
                            Quản lý sản phẩm
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview ">
                        <li class="nav-item">
                            <a href="{{route('Product.create')}}"
                               class="nav-link {{ request()->is('admin/Product/create') ? 'active' : null }}">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>
                                    Tạo mới
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Product.index')}}"
                               class="nav-link {{ request()->is('admin/Product') ? 'active' : null }}">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Sale.index')}}"
                               class="nav-link {{ request()->is('admin/Product/Sale') ? 'active' : null }}">
                                <i class="fa fa-piggy-bank nav-icon"></i>
                                <p>Danh sách khuyến mãi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Product.trashed')}}"
                               class="nav-link {{ request()->is('admin/Product/trashed') ? 'active' : null }}">
                                <i class="fa fa-trash-alt nav-icon"></i>
                                <p>Danh sách tạm gỡ</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/Category*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ request()->is('admin/Category*')? 'active' : null }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Quản lý danh mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Category.create')}}"
                               class="nav-link {{ request()->is('admin/Category/create')? 'active' : null }}">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Category.index')}}"
                               class="nav-link {{ request()->is('admin/Category')? 'active' : null }}">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Category.trashed')}}"
                               class="nav-link {{ request()->is('admin/Category/trashed')? 'active' : null }}">
                                <i class="fa fa-trash-alt nav-icon"></i>
                                <p>Danh sách tạm gỡ</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Đơn đặt hàng</li>
                <li class="nav-item has-treeview {{ request()->is('admin/Import*')||request()->is('admin/Oder*') ? 'menu-open' : null }}">
                    <a href="#"
                       class="nav-link {{ request()->is('admin/Oder*')|| request()->is('admin/Import*') ? 'active' : null}}">
                        <i class="nav-icon fas fa-shopping-cart"></i>
                        <p>
                            Quản lý đơn đặt hàng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="{{route('Oder.index')}}"
                               class="nav-link {{ request()->is('admin/Oder*')? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Bán ra
                                </p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item has-treeview">
                            <a href="{{route('Import.index')}}"
                               class="nav-link  {{ request()->is('admin/Import*')? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Nhập vào
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-header">Người dùng</li>
                <li class="nav-item has-treeview {{ request()->is('admin/Customer*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ request()->is('admin/Customer*')? 'active' : null }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Quản lý khách hàng
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Customer.index')}}"
                               class="nav-link {{ request()->is('admin/Customer')? 'active' : null }}">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        @if(Auth::user()->role ==1)
                            <li class="nav-item">
                                <a href="{{route('Customer.trashed')}}"
                                   class="nav-link {{ request()->is('admin/Customer/trashed')? 'active' : null }}">
                                    <i class="fa fa-trash-alt nav-icon"></i>
                                    <p>Danh sách tạm khóa</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>

                <li class="nav-item has-treeview  {{ request()->is('admin/Supplier*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link {{ request()->is('admin/Supplier*')? 'active' : null }}">
                        <i class="nav-icon fas fa-user-plus"></i>
                        <p>
                            Quản lý nhà cung cấp
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->role == 1 )
                            <li class="nav-item">
                                <a href="{{route('Supplier.create')}}"
                                   class="nav-link {{ request()->is('admin/Supplier/create')? 'active' : null }}">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{route('Supplier.index')}}"
                               class="nav-link {{ request()->is('admin/Supplier')? 'active' : null }}">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        @if(Auth::user()->role == 1)
                            <li class="nav-item">
                                <a href="{{route('Supplier.trashed')}}"
                                   class="nav-link {{ request()->is('admin/Supplier/trashed')? 'active' : null }}">
                                    <i class="fa fa-trash-alt nav-icon"></i>
                                    <p>Danh sách đã gỡ</p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>


                @can('viewAny',Auth::user())
                    <li class="nav-item has-treeview {{ request()->is('admin/User*') ? 'menu-open' : null }}">
                        <a href="#" class="nav-link {{ request()->is('admin/User*')? 'active' : null }}">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Quản lý nhân viên
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('User.create')}}"
                                   class="nav-link  {{ request()->is('admin/User/create')? 'active' : null }}">
                                    <i class="fa fa-plus nav-icon"></i>
                                    <p>Tạo mới</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('User.index')}}"
                                   class="nav-link  {{ request()->is('admin/User')? 'active' : null }}">
                                    <i class="fa fa-list-alt nav-icon"></i>
                                    <p>Danh sách</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('User.trashed')}}"
                                   class="nav-link  {{ request()->is('admin/User/trashed')? 'active' : null }}">
                                    <i class="fa fa-trash-alt nav-icon"></i>
                                    <p>Danh sách tạm khóa</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endcan
                <li class="nav-header">Blog</li>
                <li class="nav-item has-treeview {{ request()->is('admin/Post*') ? 'menu-open' : null }}">
                    <a href="#" class="nav-link  {{ request()->is('admin/Post*')? 'active' : null }}">
                        <i class="nav-icon fas fa-pager"></i>
                        <p>
                            Quản lý bài viết
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Post.create')}}"
                               class="nav-link  {{ request()->is('admin/Post/create')? 'active' : null }}">
                                <i class="fa fa-plus nav-icon"></i>
                                <p>Tạo mới</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Post.index')}}"
                               class="nav-link  {{ request()->is('admin/Post')? 'active' : null }}">
                                <i class="fa fa-list-alt nav-icon"></i>
                                <p>Danh sách</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Post.trashed')}}"
                               class="nav-link  {{ request()->is('admin/Post/trashed')? 'active' : null }}">
                                <i class="fa fa-trash-alt nav-icon"></i>
                                <p>Danh sách tạm khóa</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">Thống kê</li>
                <li class="nav-item has-treeview {{ request()->is('admin/Warehouse*') ? 'menu-open' : null }}">
                    <a href="{{route('Warehouse.index')}}"
                       class="nav-link  {{ request()->is('admin/Warehouse')? 'active' : null }}">
                        <i class="nav-icon fas fa-warehouse"></i>
                        <p>
                            Kho hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview {{ request()->is('admin/statistic*') ? 'menu-open' : null }}">
                    <a href="{{route('Statistic.index')}}"
                       class="nav-link  {{ request()->is('admin/statistic')? 'active' : null }}">
                        <i class="nav-icon fas fa-chart-bar"></i>
                        <p>
                            Thống kê số liệu
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
S
