<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Danh Mục</title>
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
                    <h2>
                        <?php
                            if (isset($_GET['id']))
                                echo "Sửa Thông Tin Danh Mục";
                            else
                                echo "Thêm Mới Danh Mục";
                        ?>
                    </h2>
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
                                mysqli_close($con);
                            ?>
                            >
                        </div>
                        <div class="form-group">
                            <label for="status">Trạng thái: </label>
                            <select name="status" id="status" class="form-control col-4">
                                <?php
                                    $con = mysqli_connect('localhost', 'root', '12345678', 'projectphp');
                                    $id = $_GET['id'];
                                    if (isset($id)) {
                                        $sql = "select * from category where id = $id";
                                        $result = mysqli_query($con, $sql);
                                        $row = mysqli_fetch_assoc($result);
                                        if ($row['status'] == 1) {
                                            echo '<option value="1" selected>Đang hoạt động</option>';
                                            echo '<option value="0">Không hoạt động</option>';
                                        }
                                        else {
                                            echo '<option value="1">Đang hoạt động</option>';
                                            echo '<option value="0" selected>Không hoạt động</option>';
                                        }
                                    }
                                    else {
                                        echo '<option value="1" selected>Đang hoạt động</option>';
                                        echo '<option value="0">Không hoạt động</option>';
                                    }
                                    mysqli_close($con);
                                ?>
                                
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" disabled>Lưu</button>
                        <?php
                            $con = mysqli_connect('localhost', 'root', '12345678', 'projectphp');
                            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                $name = $_POST['category'];
                                $status = $_POST['status'];
                                $categoryId = $_POST['categoryId'];
                                if (isset($categoryId)) {
                                    mysqli_query($con, "UPDATE category SET name='$name', status = '$status' WHERE id = $categoryId");
                                }
                                else{
                                    mysqli_query($con, "INSERT INTO category(name, status) VALUES ('$name', '$status')");
                                }
                            }
                            mysqli_close($con);
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    function toggleButton () {
        var category = $('#category').val();
        var isCategory = category != '' ? true : false;
        if (isCategory)
            $('button').prop('disabled', 0);
        $('#category').on('input', function () {
            category = $('#category').val();
            isCategory = category != '' ? true : false;
            if (isCategory)
                $('button').prop('disabled', 0);
            else
                $('button').prop('disabled', 1);
        })
    }
    toggleButton();
</script>
</html>