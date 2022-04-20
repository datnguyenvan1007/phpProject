<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Size</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/admin.css">
</head>
<body>
    <header>
        <div class="title">
            Quản lý bán hàng
        </div>
        <div class="user position-relative dropdown">
            <a class="dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">Settings</a>
                <a class="dropdown-item" href="#">Activity Log</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </div>
    </header>
    <main>
        <div class="sidebar position-fixed" id="accordion">
            <div class="sidebar-menu">
                <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuRole" role="button" aria-expanded="true" aria-controls="collapseMenuProduct">
                    <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
                    Quản Lý Vai Trò
                    <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
                </a>
                <div class="collapse child-menu" id="collapseMenuRole" data-parent="#accordion">
                    <a href="./role.php">Vai Trò</a>
                    <a href="./addRole.php">Thêm Vai Trò</a>
                </div>
            </div>
            <div class="sidebar-menu">
                <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuUser" role="button" aria-expanded="true" aria-controls="collapseMenuUser">
                    <div class="sidebar-menu-icon"><i class="far fa-user"></i></div>
                    Quản Lý Tài Khoản
                    <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
                </a>
                <div class="collapse child-menu" id="collapseMenuUser" data-parent="#accordion">
                    <a href="./user.php">Khách hàng</a>
                    <a href="./user.php">Nhân viên</a>
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
                    <a href="./addProduct.php">Thêm Sản Phẩm</a>
                </div>
            </div>
            <div class="sidebar-menu">
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
                <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuSize" role="button" aria-expanded="true" aria-controls="collapseMenuProduct">
                    <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
                    Quản Lý Size
                    <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
                </a>
                <div class="collapse child-menu" id="collapseMenuSize" data-parent="#accordion">
                    <a href="./size.php">Size</a>
                    <a href="./addSize.php">Thêm Size</a>
                </div>
            </div>
            <div class="sidebar-menu">
                <a class="d-flex position-relative align-items-center parent-menu collapsed" data-toggle="collapse" href="#collapseMenuOrder" role="button" aria-expanded="true" aria-controls="collapseMenuProduct">
                    <div class="sidebar-menu-icon"><i class="fas fa-columns"></i></div>
                    Quản Lý Hóa Đơn
                    <div class="sidebar-menu-arrow"><i class="fas fa-chevron-right"></i></div>
                </a>
                <div class="collapse child-menu" id="collapseMenuOrder" data-parent="#accordion">
                    <a href="./order.php">Hóa Đơn</a>
                    <a href="./statistics.php">Thống Kê</a>
                </div>
            </div>
            <div class="sidebar-footer position-absolute">
                Logged in:
                <div class="user-logged">
                    Dat Nguyen Van
                </div>
            </div>
        </div>
        <div class="main">
            <div class="card">
                <div class="card-header">
                    <h2>Danh Sách Size</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Size</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>M</td>
                                <td>
                                    <button type="button" class="btn btn-primary mr-2"><i class="far fa-edit"></i></button>
                                    <a href="#" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/header_sidebar.js"></script>
</html>