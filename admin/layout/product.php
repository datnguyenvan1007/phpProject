<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
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
                    <h2>Danh Sách Sản Phẩm</h2>
                </div>
                <div class="card-body table-responsive">
                    <div class="row mb-3">
                        <div class="col-3 input-group" style="z-index: 0;">
                            <input type="text" id="search" name="keyword" class="form-control" placeholder="Tìm kiếm sản phẩm">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                        <div class="" style="margin-left: 460px">
                            <select name="color" id="searchColor" class="form-control">
                                <option value="0"></option>
                                <?php
                                    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                    $sql = "select * from color";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value=". $row['id']. ">". $row['color']. "</option>";
                                        }
                                    }
                                    mysqli_close($con);
                                ?>
                            </select>
                        </div>
                        <div class="col-1">
                            <select name="size" id="searchSize" class="form-control">
                            <option value="0"></option>
                                <?php
                                    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                    $sql = "select * from size";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value=". $row['id']. ">". $row['size']. "</option>";
                                        }
                                    }
                                    mysqli_close($con);
                                ?>
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Giá Tiền</th>
                                <th scope="col">Số Lượng Có</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Màu Sắc</th>
                                <th scope="col">Size</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                $sql = "SELECT p.id, p.name, p.image, p.price, p.category_id, s.size, c.color, p.category_id, sc.status, sc.quantity, sc.size_id, sc.color_id FROM product p, size_color sc, size s, color c WHERE p.id = sc.product_id and sc.size_id = s.id and sc.color_id = c.id";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $status = $row['status'];
                                        if ($status == 1)
                                            $s = "Mới";
                                        else if ($status == 0)
                                            $s = "InActive";
                                        else if ($status == 2) 
                                            $s = "Bán Chạy";
                                        else if ($status == 3) 
                                            $s = "Bình Thường";
                                        else if ($status == 4) 
                                            $s = "Hết Hàng";
                                        echo "<tr>"
                                            ."<td>".$row['id']."</td>"
                                            ."<td>".$row['name']."</td>"
                                            ."<td>".$row['price']."</td>"
                                            ."<td>".$row['quantity']."</td>"
                                            ."<td>"
                                                ."<img src='".$row['image']."' alt='' width='100px'>"
                                            ."</td>"
                                            ."<td colorId = ".$row['color_id'].">".$row['color']."</td>"
                                            ."<td sizeId = ".$row['size_id'].">".$row['size']."</td>"
                                            ."<td>".$s."</td>"
                                            ."<td>"
                                                ."<a href='./addProduct.php?id=".$row['id']."&sizeId=".$row['size_id']."&colorId=".$row['color_id']."&status=".$row['status']."&category=".$row['category_id']."  ' 'type='button' class='btn btn-primary mr-2'><i class='far fa-edit'></i></a>"
                                                ."<button type='button' class='btn btn-danger delete'><i class='fas fa-trash-alt'></i></button>"
                                            ."</td>"
                                        ."</tr>";
                                    }
                                }
                                if (isset($_POST['productId']) && isset($_POST['sizeId']) && isset($_POST['colorId'])) {
                                    $productId = $_POST['productId'];
                                    $sizeId = $_POST['sizeId'];
                                    $colorId = $_POST['colorId'];
                                    mysqli_query($con, "UPDATE `size_color` SET `status`= 0 WHERE `product_id` = $productId and `size_id` = $sizeId and `color_id` = $colorId");
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
    $('#search').on('input', function() {
        var keyword = $('#search').val();
        var size = $('#searchSize').val();
        var color = $('#searchColor').val();
        $.ajax({
            data: {
                keyword: keyword,
                size: size,
                color: color
            },
            type: "post",
            url: "../ajax/ajax_product.php",
            success: function (html) {
                $('tbody').html(html);
            }
        })
    })
    $('#searchSize').on('change', function() {
        var keyword = $('#search').val();
        var size = $('#searchSize').val();
        var color = $('#searchColor').val();
        $.ajax({
            data: {
                keyword: keyword,
                size: size,
                color: color
            },
            type: "post",
            url: "../ajax/ajax_product.php",
            success: function (html) {
                $('tbody').html(html);
            }
        })
    })
    $('#searchColor').on('change', function() {
        var keyword = $('#search').val();
        var size = $('#searchSize').val();
        var color = $('#searchColor').val();
        $.ajax({
            data: {
                keyword: keyword,
                size: size,
                color: color
            },
            type: "post",
            url: "../ajax/ajax_product.php",
            success: function (html) {
                $('tbody').html(html);
            }
        })
    })
    $(document).on('click', '.delete', function () {
        var con =  confirm('Bạn có muốn xóa sản phẩm này không!');
        var tr = $(this);
        var id = $(this).closest('tr').find('td:first-child').html();
        var colorId = $(this).closest('tr').find('td:nth-child(6)').attr('colorId');
        var sizeId = $(this).closest('tr').find('td:nth-child(7)').attr('sizeId');
        id = parseInt(id);
        colorId = parseInt(colorId);
        sizeId = parseInt(sizeId);
        if (con) {
            $.ajax({ 
                data: {
                    productId: id,
                    sizeId: sizeId,
                    colorId: colorId
                },
                url: "<?php echo $_SERVER['PHP_SELF'] ?>",
                type: 'post',
                success: function(){
                    alert("Thành công");
                    $(tr).closest('tr').find('td:nth-child(8)').html('InActive');
                }
            });
        }
    })
</script>
</html>