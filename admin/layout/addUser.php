<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý</title>
    <?php include "lib.php"; ?>
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
                    <h2>
                        <?php
                            if (isset($_GET['id']))
                                echo "Sửa Thông Tin Tài Khoản";
                            else 
                                echo "Thêm Mới Tài Khoản";
                        ?>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <?php
                            if (isset($_GET['id'])) {
                                echo "<input type='hidden' name='id' value='".$_GET['id']."'>";
                            }
                        ?>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="fullname">Họ tên:</label>
                                <input type="text" name="fullname" id="fullname" require class="form-control"
                                <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                        $result = mysqli_query($con, "select * from user where id = $id");
                                        $row = mysqli_fetch_assoc($result);
                                        echo "value = '".$row['fullname']."'";
                                        mysqli_close($con);
                                    }
                                ?>
                                >
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="email">Email:</label>
                                <input type="text" name="email" id="email" require class="form-control"
                                <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                        $result = mysqli_query($con, "select * from user where id = $id");
                                        $row = mysqli_fetch_assoc($result);
                                        echo "value = '".$row['email']."'";
                                        mysqli_close($con);
                                    }
                                ?>
                                >
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="password">Mật khẩu:</label>
                                <input type="text" name="password" id="password" require class="form-control"
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $result = mysqli_query($con, "select * from user where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            echo "value = '".$row['password']."'";
                                            mysqli_close($con);
                                        }
                                    ?>
                                >
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="phone">Số điện thoại:</label>
                                <input type="text" name="phone" id="phone" require class="form-control"
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $result = mysqli_query($con, "select * from user where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            echo "value = '".$row['phone']."'";
                                            mysqli_close($con);
                                        }
                                    ?>
                                >
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="role">Vai trò:</label>
                                <select name="role" id="role" class="form-control" require>
                                    <option value="0">--Chọn--</option>
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $result = mysqli_query($con, "select * from user where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            $role = $row['role'];
                                            switch ($role) {
                                                case 'khachHang':
                                                    echo '<option value="khachHang" selected>Khách hàng</option>';
                                                    echo '<option value="nhanVien">Nhân viên</option>';
                                                    break;
                                                case 'nhanVien':
                                                    echo '<option value="khachHang">Khách hàng</option>';
                                                    echo '<option value="nhanVien" selected>Nhân viên</option>';
                                                    break;
                                            }
                                            mysqli_close($con);
                                        }
                                        else {
                                            echo '<option value="khachHang">Khách hàng</option>';
                                            echo '<option value="nhanVien">Nhân viên</option>';
                                        }
                                    ?>
                                </select>
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-5">
                                <label for="address">Địa chỉ:</label>
                                <input type="text" name="address" id="address" require class="form-control"
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $result = mysqli_query($con, "select * from user where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            echo "value = '".$row['address']."'";
                                            mysqli_close($con);
                                        }
                                    ?>
                                >
                                <span class="form-message"></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" disabled>Lưu</button>
                    </form>
                    <?php
                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                        if (isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['address']) && isset($_POST['email']) && isset($_POST['fullname'])) {
                            $password = $_POST['password'];
                            $phone = $_POST['phone'];
                            $address = $_POST['address'];
                            $role = $_POST['role'];
                            $email = $_POST['email'];
                            $fullname = $_POST['fullname'];
                            if (isset($_POST['id'])) {
                                $id = $_POST['id'];
                                mysqli_query($con, "UPDATE `user` SET `fullname`= '$fullname', `password`='$password',`phone`=$phone,`address`='$address',`email`='$email',`role`='$role' WHERE id = $id");
                            }
                            else {
                                mysqli_query($con, "INSERT INTO `user`( `fullname`, `password`, `phone`, `address`, `email`, `role`) VALUES ('$fullname', '$password',$phone,'$address','$email','$role')");
                            }
                        }
                        mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    function toggleButton () {
        var fullname = $('#fullname').val();
        var email = $('#email').val();
        var password = $('#password').val();
        var phone = $('#phone').val();
        var address = $('#address').val();
        var role = $('#role').val();
        var isFullname, isEmail, isPassword, isPhone, isAddress, isRole;
        isFullname = fullname != '' ? true : false;
        isEmail = email != '' ? true : false;
        isPassword = password != '' ? true : false;
        isPhone = phone != '' ? true : false;
        isAddress = address != '' ? true : false;
        isRole = role != '0' ? true : false;
        if (isFullname && isEmail && isAddress && isPassword && isPhone && isRole)
                $('button').prop('disabled', 0)
        else
            $('button').prop('disabled', 1);
        $('#fullname').on('input', function () {
            fullname = $('#fullname').val()
            if (fullname != '') {
                isFullname = true
            }
            else 
                isFullname = false;
            if (isFullname && isEmail && isAddress && isPassword && isPhone && isRole)
                $('button').prop('disabled', 0)
            else
                $('button').prop('disabled', 1);
        })
        $('#email').on('input', function () {
            email = $('#email').val();
            if (email != '' && /.+@.+\..+/.test(email)) {
                isEmail = true;
            }
            else 
                isEmail = false;
            if (isFullname && isEmail && isAddress && isPassword && isPhone && isRole)
                $('button').prop('disabled', 0)
            else
                $('button').prop('disabled', 1);
        })
        $('#address').on('input', function () {
            address = $('#address').val();
            if (address != '') {
                isAddress = true;
            }
            else
                isAddress = false;
            if (isFullname && isEmail && isAddress && isPassword && isPhone && isRole)
                $('button').prop('disabled', 0)
            else
                $('button').prop('disabled', 1);
        })
        $('#password').on('input', function () {
            password = $('#password').val();
            if (password != '') {
                isPassword = true;
            }
            else
                isPassword = false;
            if (isFullname && isEmail && isAddress && isPassword && isPhone && isRole)
                $('button').prop('disabled', 0)
            else
                $('button').prop('disabled', 1);
        })
        $('#role').on('change', function () {
            role = $('#role').val();
            if (role != '0') {
                isRole = true;
            }
            else
                isRole = false;
            if (isFullname && isEmail && isAddress && isPassword && isPhone && isRole)
                $('button').prop('disabled', 0)
            else
                $('button').prop('disabled', 1);
        })
        $('#phone').on('input', function () {
            phone = $('#phone').val();
            if (phone != '' && /^[0-9]+$/.test(phone)) {
                isPhone = true;
            }
            else
                isPhone = false;
            if (isFullname && isEmail && isAddress && isPassword && isPhone && isRole)
                $('button').prop('disabled', 0)
            else
                $('button').prop('disabled', 1);
        })
    }
    toggleButton();
</script>
</html>