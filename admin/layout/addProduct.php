<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản Phẩm</title>
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
                                echo "Sửa Thông Tin Sản Phẩm";
                            else
                                echo "Thêm Mới Sản Phẩm";
                        ?>
                    </h2>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                        <?php
                            if (isset($_GET['id'])) {
                                echo '<input type="text" name="id" value="'.$_GET['id'].'" hidden>';
                                echo '<input type="text" name="colorId" value="'.$_GET['colorId'].'" hidden>';
                                echo '<input type="text" name="sizeId" value="'.$_GET['sizeId'].'" hidden>';
                            }
                        ?>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="name">Tên Sản Phẩm:</label>
                                <input type="text" name="name" id="name" class="form-control" require
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $result = mysqli_query($con, "select * from product where id = $id");
                                            $row = mysqli_fetch_assoc($result);
                                            echo "value = '".$row['name']."'";
                                            mysqli_close($con);
                                        }
                                    ?>
                                >
                            </div>
                            <div class="col-5 form-group">
                                <label for="image">Hình Ảnh:</label>
                                <input type="file" name="image" id="image" class="form-control-file" require>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="category">Danh Mục:</label>
                                <select name="category" id="category" class="form-control" require>
                                    <option value="0">--Chọn--</option>
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                        $sql = "select * from category";
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if (isset($_GET['category']) && $row['id'] == $_GET['category']) {
                                                    echo "<option value=". $row['id']. " selected>". $row['name']. "</option>";
                                                }
                                                else
                                                    echo "<option value=". $row['id']. ">". $row['name']. "</option>";
                                            }
                                        }
                                        mysqli_close($con);
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="price">Giá Tiền:</label>
                                <div class="input-group">
                                    <input type="text" name="price" id="price" class="form-control" require
                                        <?php
                                            if (isset($_GET['id'])) {
                                                $id = $_GET['id'];
                                                $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                                $result = mysqli_query($con, "select * from product where id = $id");
                                                $row = mysqli_fetch_assoc($result);
                                                echo "value = '".$row['price']."'";
                                                mysqli_close($con);
                                            }
                                        ?>
                                    >
                                    <div class="input-group-append">
                                        <span class="input-group-text">đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label for="quantity">Số Lượng:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" require
                                    <?php
                                        if (isset($_GET['id'])) {
                                            $id = $_GET['id'];
                                            $colorId = $_GET['colorId'];
                                            $sizeId = $_GET['sizeId'];
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $result = mysqli_query($con, "select * from size_color where product_id = $id and size_id = $sizeId and color_id = $colorId");
                                            $row = mysqli_fetch_assoc($result);
                                            echo "value = '".$row['quantity']."'";
                                            mysqli_close($con);
                                        }
                                    ?>
                                >
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 form-group">
                                <label for="size">Size:</label>
                                <select name="size" id="size" class="form-control" require
                                <?php
                                    if (isset($_GET['id'])) 
                                        echo "disabled";
                                ?>>
                                    <option value="0">--Chọn--</option>
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                        $sql = "select * from size where status = 1";
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                if (isset($_GET['id']) && isset($_GET['sizeId'])) {
                                                    $productId = $_GET['id'];
                                                    $sizeId = $_GET['sizeId'];
                                                    if ($sizeId == $row['id']) {
                                                        echo "<option value=". $row['id']. " selected>". $row['size']. "</option>";
                                                    }
                                                    else
                                                        echo "<option value=". $row['id']. ">". $row['size']. "</option>";
                                                }
                                                else
                                                    echo "<option value=". $row['id']. ">". $row['size']. "</option>";
                                            }
                                        }
                                        mysqli_close($con);
                                    ?>
                                </select>
                            </div>
                            <div class="col-2 form-group">
                                <label for="color">Color:</label>
                                <select name="color[]" id="color" class="form-control" require
                                    <?php
                                        if (isset($_GET['id']))
                                            echo " disabled";
                                        else
                                            echo " multiple";
                                    ?>
                                >
                                    <option value="0">--Chọn--</option>
                                    <?php
                                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                        $sql = "select * from color where status = 1";
                                        $result = mysqli_query($con, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $colorId = $_GET['colorId'];
                                                if (isset($colorId) && $colorId == $row['id']) {
                                                    echo "<option value=". $row['id']. " selected>". $row['color']. "</option>";
                                                }
                                                else
                                                    echo "<option value=". $row['id']. ">". $row['color']. "</option>";
                                            }
                                        }
                                        mysqli_close($con);
                                    ?>
                                </select>
                            </div>
                            <div class="col-2 form-group">
                                <label for="status">Trạng Thái:</label>
                                <select name="status" id="status" class="form-control" <?php
                                    if (!isset($_GET['id'])) 
                                        echo "disabled";
                                ?>>
                                <?php
                                    if (isset($_GET['id']) && isset($_GET['status'])) {
                                        $id = $_GET['id'];
                                        $status = $_GET['status'];
                                        switch ($status) {
                                            case 0:
                                                echo '<option value="1">Mới</option>'
                                                    .'<option value="2">Bán chạy</option>'
                                                    .'<option value="3">Bình thường</option>'
                                                    .'<option value="4">Hết hàng</option>'
                                                    .'<option value="0" selected>InActive</option>';
                                                break;
                                            case 1:
                                                echo '<option value="1" selected>Mới</option>'
                                                    .'<option value="2">Bán chạy</option>'
                                                    .'<option value="3">Bình thường</option>'
                                                    .'<option value="4">Hết hàng</option>'
                                                    .'<option value="0">InActive</option>';
                                                break;
                                            case 2:
                                                echo '<option value="1">Mới</option>'
                                                    .'<option value="2" selected>Bán chạy</option>'
                                                    .'<option value="3">Bình thường</option>'
                                                    .'<option value="4">Hết hàng</option>'
                                                    .'<option value="0">InActive</option>';
                                                break;
                                            case 3:
                                                echo '<option value="1">Mới</option>'
                                                    .'<option value="2">Bán chạy</option>'
                                                    .'<option value="3" selected>Bình thường</option>'
                                                    .'<option value="4">Hết hàng</option>'
                                                    .'<option value="0">InActive</option>';
                                                break;
                                            case 4:
                                                echo '<option value="1">Mới</option>'
                                                    .'<option value="2">Bán chạy</option>'
                                                    .'<option value="3">Bình thường</option>'
                                                    .'<option value="4" selected>Hết hàng</option>'
                                                    .'<option value="0">InActive</option>';
                                                break;
                                        }
                                        mysqli_close($con);
                                    }
                                    else {
                                        echo '<option value="1" selected>Mới</option>'
                                            .'<option value="2">Bán chạy</option>'
                                            .'<option value="3">Bình thường</option>'
                                            .'<option value="4">Hết hàng</option>'
                                            .'<option value="0">InActive</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-10">
                                <label for="description">Mô Tả:</label>
                                <textarea name="description" id="description" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" disabled>Lưu</button>
                    </form>
                    <?php
                        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                        $image = "../../images/". basename($_FILES['image']['name']);
                        $uploadOk = 1;
                        $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
                        if (!getimagesize($_FILES['image']['tmp_name']))
                            $uploadOk = 0;
                        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') 
                            $uploadOk = 0;
                        if (isset($_POST['name']) && isset($_POST['quantity']) && isset($_POST['price'])
                        && $_POST['category'] > 0) {
                            $name = $_POST['name'];
                            $category = $_POST['category'];
                            $status = $_POST['status'];
                            $price = $_POST['price'];
                            $quantity = $_POST['quantity'];
                            if (isset($_POST['id'])) {
                                $id = $_POST['id'];
                                $color = $_POST['colorId'];
                                $size = $_POST['sizeId'];
                                $sql = "UPDATE `product` SET `name`='$name',`price`=$price,`category_id`=$category";
                                if (isset($_POST['description'])) {
                                    $description = $_POST['description'];
                                    $sql .= ", `description`= '$description'";
                                }
                                if ($uploadOk) {
                                    if (file_exists($target_file))
                                        unlink($image);
                                    $sql .= ", `image` = '$image'";
                                    move_uploaded_file($_FILES["image"]["tmp_name"], $image);
                                }
                                mysqli_query($con, $sql . " WHERE id = $id");
                                mysqli_query($con, "UPDATE `size_color` SET `status`=$status,`quantity`=$quantity WHERE product_id = $id and size_id = $size and color_id = $color");
                            }
                            else {
                                if ($_POST['size'] > 0) {
                                    $color = $_POST['color'];
                                    $size = $_POST['size'];
                                    $resultProductId = mysqli_query($con, "SELECT * FROM `product` WHERE `name` = '$name' and `price` = $price and `category_id` = $category");
                                    $row = mysqli_fetch_assoc($resultProductId);
                                    if (isset($row['id'])) {
                                        $productId = $row['id'];
                                        foreach ($color as $item)
                                            mysqli_query($con, "INSERT INTO `size_color`(`product_id`, `size_id`, `color_id`, `quantity`) VALUES ($productId, $size, $item, $quantity)");
                                    }
                                    else {
                                        if ($uploadOk) {
                                            if (file_exists($target_file))
                                            unlink($image);
                                            mysqli_query($con, "INSERT INTO `product`(`name`, `image`, `price`, `category_id`, `description`) VALUES ('$name', '$image', $price, $category, '$description')");
                                            $resultProductId = mysqli_query($con, "SELECT * FROM `product` WHERE `name` = '$name' and `price` = $price and `category_id` = $category");
                                            $row = mysqli_fetch_assoc($resultProductId);
                                            $productId = $row['id'];  
                                            foreach ($color as $item) {  
                                                mysqli_query($con, "INSERT INTO `size_color`(`product_id`, `size_id`, `color_id`, `quantity`) VALUES ($productId, $size, $item, $quantity)");
                                            }
                                            move_uploaded_file($_FILES["image"]["tmp_name"], $image);
                                        }
                                    }
                                }
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
        var name = $('#name').val();
        var category = $('#category').val();
        var size = $('#size').val();
        var color = $('#color').val();
        category = parseInt(category);
        size = parseInt(size);
        var isName = name != '' ? true : false;
        var isCategory = category != 0 ? true : false;
        var isSize = size != 0 ? true : false;
        var isColor = color.length != 0 ? true : false;
        var isPrice = price != ''  ? true : false;
        var isQuantity = quantity != '' ? true : false;
        $('#name').on('input', function () {
            name = $('#name').val();
            isName = name != '' ? true : false;
            if (isName && isCategory && isSize && isColor && isPrice && isQuantity)
                $('button').prop('disabled', 0);
            else
                $('button').prop('disabled', 1);
        })
        $('#category').on('input', function () {
            category = $('#category').val();
            category = parseInt(category);
            isCategory = category != 0 ? true : false;
            if (isName && isCategory && isSize && isColor && isPrice && isQuantity)
                $('button').prop('disabled', 0);
            else
                $('button').prop('disabled', 1);
        })
        $('#size').on('change', function () {
            size = $('#size').val();
            size = parseInt(size);
            isSize = size != 0 ? true : false;
            if (isName && isCategory && isSize && isColor && isPrice && isQuantity)
                $('button').prop('disabled', 0);
            else
                $('button').prop('disabled', 1);
        })
        $('#color').on('change', function () {
            color = $('#color').val();
            isColor = color.length != 0 ? true : false;
            if (isName && isCategory && isSize && isColor && isPrice && isQuantity)
                $('button').prop('disabled', 0);
            else
                $('button').prop('disabled', 1);
        })
        $('#price').on('input', function () {
            price = $('#price').val();
            isPrice = (price != '' && /^[0-9]+$/.test(price)) ? true : false;
            if (isName && isCategory && isSize && isColor && isPrice && isQuantity)
                $('button').prop('disabled', 0);
            else
                $('button').prop('disabled', 1);
        })
        $('#quantity').on('input', function () {
            quantity = $('#quantity').val();
            isQuantity = quantity != '' ? true : false;
            if (isName && isCategory && isSize && isColor && isPrice && isQuantity)
                $('button').prop('disabled', 0);
            else
                $('button').prop('disabled', 1);
        })
    }
    toggleButton();
</script>
</html>