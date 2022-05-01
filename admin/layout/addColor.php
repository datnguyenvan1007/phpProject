<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Màu Sắc</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/admin.css">
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
                    <h2>Thêm Mới Màu Sắc</h2>
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
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                    <?php
                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                        if (isset($_POST['color'], $_POST['colorCode'])) {
                            $colorCode = $_POST['colorCode'];
                            $color = $_POST['color'];
                            if (isset($_POST['id'])) {
                                $id = $_POST['id'];
                                mysqli_query($con, "UPDATE `color` SET `color`= '$color',`colorCode`= '$colorCode' where id = $id");
                            }
                            else {
                                mysqli_query($con, "INSERT INTO `color`(`color`, `colorCode`) VALUES ('$color', '$colorCode')");
                            }
                        }
                        mysqli_close($con);
                    ?>
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