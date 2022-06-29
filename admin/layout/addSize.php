<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Size</title>
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
                                echo "Sửa Thông Tin Size";
                            else
                                echo "Thêm Mới Size";
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
                            <div class="col-3 form-group">
                                <label for="size">Size:</label>
                                <input type="text" name="size" id="size" class="form-control"
                                    <?php 
                                        if (isset($_GET['id'])) {
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $id = $_GET['id'];
                                            $result = mysqli_query($con, "select * from size where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            echo "value = '". $row['size']. "'";
                                            mysqli_close($con);
                                        }
                                    ?>
                                >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 form-group">
                                <label for="status">Trạng Thái:</label>
                                <select name="status" id="status" class="form-control">
                                    <?php 
                                        if (isset($_GET['id'])) {
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $id = $_GET['id'];
                                            $result = mysqli_query($con, "select * from size where id = $id");
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
                                        else {
                                            echo '<option value="0">Không hoạt động</option>';
                                            echo '<option value="1" selected>Đang hoạt động</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                    <?php
                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                        if (isset($_POST['size']) && isset($_POST['status'])) {
                            $size = strtoupper($_POST['size']);
                            $status = $_POST['status'];
                            if (isset($_POST['id'])) {
                                $id = $_POST['id'];
                                mysqli_query($con, "UPDATE size SET size='$size', status = $status WHERE id=$id");
                            }
                            else {
                                mysqli_query($con, "INSERT INTO size(size, status) VALUES ('$size', $status)");
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