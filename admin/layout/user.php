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
                    <h2>Danh Sách Khách Hàng</h2>
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
                                        echo '<tr>'
                                                .'<td>'.$row['id'].'</td>'
                                                .'<td>'.$row['fullname'].'</td>'
                                                .'<td>'.$row['email'].'</td>'
                                                .'<td>'.$row['password'].'</td>'
                                                .'<td>'.$row['phone'].'</td>'
                                                .'<td>'.$row['address'].'</td>'
                                                .'<td>'
                                                    .'<a href="./addUser.php?id='.$row['id'].'" type="button" class="btn btn-primary mr-2 text-light"><i class="far fa-edit"></i></a>'
                                                    .'<button href="#" type="button" class="btn btn-danger delete"><i class="fas fa-trash-alt"></i></button>'
                                                .'</td>'
                                            .'</tr>';
                                    }
                                    if (isset($_POST['deleteId'])) {
                                        $deleteId = $_POST['deleteId'];
                                        mysqli_query($con, "DELETE FROM `user` WHERE `id` = $deleteId");
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
    $(document).on('click', '.delete', function () {
        var con =  confirm('Bạn có muốn xóa danh mục này không!');
        var tr = $(this);
        var id = $(this).closest('tr').find('td:first-child').html();
        id = parseInt(id);
        if (con) {
            $.ajax({ 
                data: {
                    deleteId: id
                },
                url: "<?php echo $_SERVER['PHP_SELF'] ?>",
                type: 'POST',
                success: function(){
                    $(tr).closest('tr').remove();
                }
            });
        }
    })
</script>
</html>