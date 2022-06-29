<?php
    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
    if (isset($_POST['option']) && isset($_POST['saleorderId']) && isset($_POST['sizeId']) && isset($_POST['colorId']) && isset($_POST['productId']) && isset($_POST['quantity'])) {
        $id = $_POST['option'];
        $saleorderId = $_POST['saleorderId'];
        $productId = $_POST['productId'];
        $sizeId = $_POST['sizeId'];
        $colorId = $_POST['colorId'];
        $quantity = $_POST['quantity'];
        $result = mysqli_query($con, "select * from size_color where product_id = $productId AND size_id = $sizeId AND color_id = $colorId");
        $row = mysqli_fetch_assoc($result);
        $quantityOld = $row['quantity'];
        if ($id == 2) {
            if ($quantityOld >= $quantity) {
                $quantity = $quantityOld - $quantity;
                mysqli_query($con, "UPDATE `size_color` SET `quantity`= $quantity WHERE product_id = $productId AND size_id = $sizeId AND color_id = $colorId");
                mysqli_query($con, "UPDATE product_saleorder SET status = 2 WHERE saleorder_id = $saleorderId AND product_id = $productId AND size_id = $sizeId AND color_id = $colorId");
            }
            else 
                echo "Số lượng không đủ";
        }
        else
            mysqli_query($con, "UPDATE product_saleorder SET status = 0 WHERE saleorder_id = $saleorderId AND product_id = $productId AND size_id = $sizeId AND color_id = $colorId");
    }
    mysqli_close($con);
?>