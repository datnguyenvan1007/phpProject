<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Màu Sắc</title>
    <?php include "lib.php"; ?>
</head>
<body>
    <div class="notification">
        
    </div>
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
                                echo "Sửa Thông Tin Màu Sắc";
                            else
                                echo "Thêm Mới Màu Sắc";
                        ?>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <?php 
                            if (isset($_GET['id'])) {
                                echo "<input type='text' name='id' hidden value='".$_GET['id']."'>";
                            }
                        ?>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="color">Màu Sắc:</label>
                                <input type="text" class="form-control" name="color" id="color" require
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $id = $_GET['id'];
                                            $result = mysqli_query($con, "select * from color where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            echo "value = '".$row['color']."'";
                                            mysqli_close($con);
                                        }
                                    ?>
                                >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="colorCode">Mã Màu:</label>
                                <input type="color" class="form-control" name="colorCode" id="colorCode" require
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $id = $_GET['id'];
                                            $result = mysqli_query($con, "select * from color where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            echo "value = '".$row['colorCode']."'";
                                            mysqli_close($con);
                                        }
                                    ?>
                                >
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                            <label for="status">Trạng Thái:</label>
                                <select name="status" id="status" class="form-control">
                                    <?php 
                                        if (isset($_GET['id'])) {
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $id = $_GET['id'];
                                            $result = mysqli_query($con, "select * from color where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            if ($row['status'] == 0) {
                                                echo '<option value="0" selected>Không hoạt động</option>';
                                                echo '<option value="1">Đang hoạt động</option>';
                                            }
                                            else {
                                                echo '<option value="0">Không hoạt động</option>';
                                                echo '<option value="1" selected>Đang hoạt động</option>';
                                            }
                                            mysqli_close($con);
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                    <?php
                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                        if (isset($_POST['color'], $_POST['colorCode'], $_POST['status'])) {
                            $colorCode = $_POST['colorCode'];
                            $color = $_POST['color'];
                            $status = $_POST['status'];
                            if (isset($_POST['id'])) {
                                $id = $_POST['id'];
                                mysqli_query($con, "UPDATE `color` SET `color`= '$color',`colorCode`= '$colorCode', status = $status where id = $id");
                            }
                            else {
                                mysqli_query($con, "INSERT INTO `color`(`color`, `colorCode`, status) VALUES ('$color', '$colorCode', status)");
                            }
                        }
                        mysqli_close($con);
                    ?>
                </div>
            </div>
        </div>
    </main>
</body>
</html>