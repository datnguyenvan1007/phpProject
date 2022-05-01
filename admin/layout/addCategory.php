<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Danh Mục</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/admin.css">
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
                    <h2>Thêm Mới Danh Mục</h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-group">
                            <?php 
                                $id = $_GET['id'];
                                if (isset($id))
                                    echo "<input type='hidden' name='categoryId' value=$id>";
                            ?>
                            <label for="category">Nhập danh mục: </label>
                            <input type="text" name="category" id="category" class="form-control col-4" placeholder="Tên danh mục"
                            <?php
                                $con = mysqli_connect('localhost', 'root', '12345678', 'projectphp');
                                $id = $_GET['id'];
                                if (isset($id)) {
                                    $sql = "select * from category where id = $id";
                                    $result = mysqli_query($con, $sql);
                                    $row = mysqli_fetch_assoc($result);
                                    echo "value='" .$row['name']. "'";
                                }
                                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                    $name = $_POST['category'];
                                    $categoryId = $_POST['categoryId'];
                                    if (isset($categoryId)) {
                                        mysqli_query($con, "UPDATE category SET name='$name' WHERE id = $categoryId");
                                    }
                                    else{
                                        mysqli_query($con, "INSERT INTO category(name) VALUES ('$name')");
                                    }
                                }
                                mysqli_close($con);
                            ?>
                            >
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>