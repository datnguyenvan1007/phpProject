<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/admin.css">
</head>
<body>
    <div class="notification"></div>
    <?php
        include 'header.php';
    ?>
    <main>
        <?php
            include 'sidebar.php';
        ?>
        <div class="main">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm Mới Tài Khoản</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="username">Tên tài khoản:</label>
                                <input type="text" name="username" id="username" class="form-control">
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="password">Mật khẩu:</label>
                                <input type="text" name="password" id="password" class="form-control">
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" class="form-control">
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="role">Vai trò:</label>
                                <select name="role" id="role" class="form-control">
                                    <option value="0">--Chọn--</option>
                                    <option value="1">Khách hàng</option>
                                    <option value="2">Nhân viên</option>
                                </select>
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" name="address" id="address" class="form-control">
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success">Thêm mới</button>
                        <button class="btn btn-primary save">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/admin.js"></script>
</html>