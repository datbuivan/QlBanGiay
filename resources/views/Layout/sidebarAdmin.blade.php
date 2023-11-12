<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a style="cursor: pointer;" class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Trang chủ</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="/QLBanGiay/admin/statisticAll">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>THỐNG KÊ</span></a>
    </li>
    <hr class="sidebar-divider my-0">

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link collapsed" style="cursor: pointer;" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>QUẢN LÝ SẢN PHẨM</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/QLBanGiay/admin/product">Danh sách sản phẩm</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" style="cursor: pointer;" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>ĐƠN ĐẶT HÀNG</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/QLBanGiay/admin/listOrder">Danh sách đơn hàng</a>
                <a class="collapse-item" href="/QLBanGiay/admin/listOrderDetail">Chi tiết đơn hàng</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" style="cursor: pointer;" href="#" data-toggle="collapse"
            data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>QUẢN LÝ NGƯỜI DÙNG</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="login.html">Danh sách khách hàng</a>
                <a class="collapse-item" href="register.html">Danh sách nhân viên</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">


    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>