<?php
    session_start();
?>
<div class="sidebar position-fixed" id="accordion">
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuUser" role="button" aria-expanded="true" aria-controls="collapseMenuUser">
            <div class="sidebar-menu-icon"><i class="far fa-user"></i></div>
            Quản Lý Tài Khoản
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseMenuUser" data-parent="#accordion">
            <a href="./user.php?role='khachHang'">Khách hàng</a>
            <a href="./user.php?role='nhanVien'">Nhân viên</a>
            <a href="./addUser.php">Thêm tài khoản</a>
        </div>
    </div>
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuCategory" role="button" aria-expanded="true" aria-controls="collapseMenuCategory">
            <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
            Quản Lý Danh Mục
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseMenuCategory" data-parent="#accordion">
            <a href="./category.php">Danh Mục</a>
            <a href="./addCategory.php">Thêm Danh Mục</a>
        </div>
    </div>
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuProduct" role="button" aria-expanded="true" aria-controls="collapseMenuProduct">
            <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
            Quản Lý Sản Phẩm
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseMenuProduct" data-parent="#accordion">
            <a href="./product.php">Sản Phẩm</a>
            <a href="./color.php">Màu Sắc</a>
            <a href="./size.php">Size</a>
            <a href="./addProduct.php">Thêm Sản Phẩm</a>
        </div>
    </div>
    <!-- <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuColor" role="button" aria-expanded="true" aria-controls="collapseMenuProduct">
            <div class="sidebar-menu-icon"><i class="far fa-palette"></i></div>
            Quản Lý Màu Sắc
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseMenuColor" data-parent="#accordion">
            <a href="./color.php">Màu Sắc</a>
            <a href="./addColor.php">Thêm Màu Sắc</a>
        </div>
    </div>
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuSize" role="button" aria-expanded="true" aria-controls="collapseMenuSize">
            <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
            Quản Lý Size
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseMenuSize" data-parent="#accordion">
            <a href="./size.php">Size</a>
            <a href="./addSize.php">Thêm Size</a>
        </div>
    </div> -->
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuOrder" role="button" aria-expanded="true" aria-controls="collapseMenuProduct">
            <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
            Quản Lý Hóa Đơn
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseMenuOrder" data-parent="#accordion">
            <a href="./order.php">Hóa Đơn</a>
        </div>
    </div>
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseStatistics" role="button" aria-expanded="true" aria-controls="collapseStatistics">
            <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
            Thống Kê
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseStatistics" data-parent="#accordion">
            <a href="./statisticsRevenue.php">Doanh Thu</a>
            <a href="./statisticsProductSold.php">Hàng Đã Bán</a>
            <a href="./statisticsProductInStock.php">Hàng Tồn Kho</a>
        </div>
    </div>
    <div class="sidebar-footer position-absolute">
        Logged in:
        <div class="user-logged">
            <?php
                if (isset($_SESSION['user']))
                    echo $_SESSION['user']['email'];
            ?>
        </div>
    </div>
</div>