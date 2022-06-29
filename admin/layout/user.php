<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Khách Hàng</title>
    <?php include "lib.php"; ?>
</head>
<body>
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
                    <?php
                        $role = $_GET['role'];
                        if (strcmp($role, "'khachHang'") == 0)
                            echo "<h2>Danh Sách Khách Hàng</h2>";
                        if (strcmp($role, "'nhanVien'") == 0)
                            echo "<h2>Danh Sách Nhân Viên</h2>"
                    ?>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Họ tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mật Khẩu</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                $role = $_GET['role'];
                                $result = mysqli_query($con, "select * from user where role = $role");
                                if (mysqli_num_rows($result) > 0)
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $status = $row['status'] == 1 ? "Đang hoạt động" : "Bị khóa";
                                        echo '<tr>'
                                                .'<td>'.$row['id'].'</td>'
                                                .'<td>'.$row['fullname'].'</td>'
                                                .'<td>'.$row['email'].'</td>'
                                                .'<td>'.$row['password'].'</td>'
                                                .'<td>'.$row['phone'].'</td>'
                                                .'<td>'.$row['address'].'</td>'
                                                .'<td>'.$status.'</td>'
                                                .'<td>'
                                                    .'<button type="button" class="btn btn-primary mr-2 text-light unlock"><i class="far fa-lock-open-alt"></i></button>'
                                                    .'<button type="button" class="btn btn-danger lock"><i class="far fa-lock-alt"></i></button>'
                                                .'</td>'
                                            .'</tr>';
                                    }
                                mysqli_close($con);
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    $(document).on('click', '.lock', function () {
        var con =  confirm('Bạn có muốn khóa tài khoản này không!');
        var tr = $(this);
        var id = $(this).closest('tr').find('td:first-child').html();
        id = parseInt(id);
        if (con) {
            $.ajax({ 
                data: {
                    lockId: id
                },
                url: "../ajax/ajax_user.php",
                type: 'POST',
                success: function(){
                    $(tr).closest('tr').find('td:nth-child(7)').html("Bị khóa");
                }
            });
        }
    })

    $(document).on('click', '.unlock', function () {
        var con =  confirm('Bạn có muốn mở khóa tài khoản này không!');
        var tr = $(this);
        var id = $(this).closest('tr').find('td:first-child').html();
        id = parseInt(id);
        if (con) {
            $.ajax({ 
                data: {
                    unlockId: id
                },
                url: "../ajax/ajax_user.php",
                type: 'POST',
                success: function(){
                    $(tr).closest('tr').find('td:nth-child(7)').html("Đang hoạt động");
                }
            });
        }
    })
</script>
</html>