<?php
    session_start();
    
?>
<div class="sidebar position-fixed" id="accordion">
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuCategory" role="button" aria-expanded="true" aria-controls="collapseMenuCategory">
            <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
            Danh Mục Sản Phẩm
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseMenuCategory" data-parent="#accordion">
            <a href="./category.php">Danh Mục</a>
            <a href="./addCategory.php">Thêm Danh Mục</a>
        </div>
    </div>
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuProduct" role="button" aria-expanded="true" aria-controls="collapseMenuProduct">
            <div class="sidebar-menu-icon"><i class="far fa-box"></i></div>
            Sản Phẩm
            <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
        </a>
        <div class="collapse child-menu" id="collapseMenuProduct" data-parent="#accordion">
            <a href="./product.php">Sản Phẩm</a>
            <a href="./color.php">Màu Sắc</a>
            <a href="./size.php">Size</a>
            <a href="./addProduct.php">Thêm Sản Phẩm</a>
        </div>
    </div>
    <div class="sidebar-menu">
        <a href="./order.php" class="d-flex position-relative align-items-center parent-menu collapsed">
            <div class="sidebar-menu-icon"><i class="fal fa-ballot"></i></div>
            Hóa Đơn
        </a>
    </div>
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" href="./user.php?role='khachHang'">
            <div class="sidebar-menu-icon"><i class="far fa-user"></i></div>
            Khách Hàng
            <!-- <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div> -->
        </a>
        <!-- <div class="collapse child-menu" id="collapseMenuUser" data-parent="#accordion">
            <a href="./user.php?role='khachHang'">Khách hàng</a>
            <a href="./user.php?role='nhanVien'">Nhân viên</a>
            <a href="./addUser.php">Thêm tài khoản</a>
        </div> -->
    </div>
    <div class="sidebar-menu">
        <a class="d-flex position-relative align-items-center parent-menu collapsed" href="./statistics.php">
            <div class="sidebar-menu-icon"><i class="far fa-chart-bar"></i></div>
            Thống Kê
        </a>
    </div>
    <!-- <div class="sidebar-footer position-absolute">
        Logged in:
        <div class="user-logged">
            <?php
                if (isset($_SESSION['user']))
                    echo $_SESSION['user']['email'];
            ?>
        </div>
    </div> -->
</div>