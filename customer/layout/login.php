<?php
        session_start();
            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $id;
                $logined = 0;
                $email = $_POST['email'];
                $password = $_POST['password'];
                $result = mysqli_query($con, "select * from user");
                if (mysqli_num_rows($result) > 0)
                while ($row = mysqli_fetch_assoc($result)) {
                    if (strcmp($email, $row['email']) == 0 && strcmp($password, $row['password']) == 0) {
                        
                        $_SESSION['user']['id']=$row['id'];
                        $_SESSION['user']['email']=$email;
                        $_SESSION['user']['password']=$password;
                        $_SESSION['user']['name']=$row['fullname'];
                        $_SESSION['user']['address']=$row['address'];
                        $_SESSION['user']['phoneNumber']=$row['phone'];
                        $_SESSION['user']['status']=$row['status'];
                        
                        if (strcmp($row['role'], "nhanVien") == 0)
                            $logined = 1;
                        if (strcmp($row['role'], "khachHang") == 0)
                            $logined = 2;
                        break;
                    }
                }
                
                if ($logined == 1) {
                    if($_SESSION['user']['status']==1){
                        echo "<script>document.location.href = '../../admin/layout/admin.php';</script>";
                    }
                    else{
                        
                        echo '<script>alert("Tài khoản đã bị khóa!!!")</script>';
                    }
                }
                if ($logined == 2) {
                    if($_SESSION['user']['status']==1){
                        if(isset($_GET['action'])){
                            $action=$_GET['action'];
                            
                            header('location: ./'.$action.'.php');
                        }
                        else{
                            
                            echo "<script>document.location.href = './home.php?';</script>";
                        }
                        
                    }
                    else{
                        
                        echo '<script>alert("Tài khoản đã bị khóa!!!")</script>';
                    }
                }
            }
            if(isset($_GET['action'])&&$_GET['action']=='logout'){
                session_destroy();
            }
            mysqli_close($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="../css/header_footer.css">
    <link rel="stylesheet" href="../css/login_register.css">
    <script src="../js/jquery.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
  
    <?php
        include 'header.php';
    ?>
    <main>
        
        <div class="container d-flex flex-column align-items-center">
            <div class="title">ĐĂNG NHẬP</div>
            <form action="" method="post" class="d-flex flex-column">
                <input type="email" name="email" id="email" placeholder="Email">
                <input type="password" name="password" id="password" placeholder="Mật khẩu">
                <button type="submit" class="">Đăng nhập</button>
            </form>
            <a href="./home.php">Trở về</a>
            <a href="./register.php">Đăng ký</a>
            <!-- <a href="./forgot_password.php">Quên mật khẩu</a> -->
        </div>
       
    </main>
    <footer>
        <div class="container footer-container">
            <div>
                <ul>
                    <li>
                        <h2>À Shoes</h2>
                    </li>
                    <li class="title">
                        <h5>Cửa Hàng Thời Trang À Shoes</h5>
                    </li>
                    <li>
                        MST: 0303083083 Do Sở kế hoạch và Đầu tư TP.HCM cấp ngày 28/10/2015
                    </li>
                    <li>
                        Địa Chỉ: 36/9 Nguyễn Gia Trí, Phường 25, Quận Bình Thạnh, Thành phố Hồ Chí Minh, Việt Nam
                    </li>
                    <li>
                        Hotline: 1900 63 6641
                    </li>
                    <li>
                        Email: gosumo@havang.com
                    </li>
                    <li>
                        <img width="150px" title="GOSUMO.VN Đã Thông Báo Bộ Công Thương" alt="GOSUMO.VN Đã Thông Báo Bộ Công Thương" src="https://file.hstatic.net/1000366086/file/logosalenoti_33c2adb969af402c8aa3a6d01289f601.png">
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <h5>Thông tin cửa hàng</h5>
                    </li>
                    <li>
                        Giới thiệu
                    </li>
                    <li>
                        Liên hệ
                    </li>
                    <li>
                        Thương hiệu
                    </li>
                    <li>
                        Hệ thống cửa hàng
                    </li>
                    <li>
                        Chính sách giao nhận
                    </li>
                    <li>
                        Chính sách đổi trả
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <h5>Hỗ trợ khách hàng</h5>
                    </li>
                    <li>
                        Hướng dẫn chọn size
                    </li>
                    <li>
                        Quy định & hình thức thanh toán
                    </li>
                    <li>
                        Hotline: 1900 63 6641
                    </li>
                    <li>
                        Email: gosumo@havang.com
                    </li>
                    <li>
                        <img width="150px" title="GOSUMO.VN Đã Thông Báo Bộ Công Thương" alt="GOSUMO.VN Đã Thông Báo Bộ Công Thương" src="https://file.hstatic.net/1000366086/file/logosalenoti_33c2adb969af402c8aa3a6d01289f601.png">
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>
<script>
    $(document).on('input', '#toggle-modal', function () {
        document.location.href="./cart.php";
    })
    
</script>
</html>