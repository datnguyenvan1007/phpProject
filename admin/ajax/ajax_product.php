<?php
    $sql = "SELECT p.id, p.name, p.image, p.price, p.category_id, s.size, c.color, p.category_id, sc.status, sc.quantity, sc.size_id, sc.color_id FROM product p, size_color sc, size s, color c WHERE p.id = sc.product_id and sc.size_id = s.id and sc.color_id = c.id";
    if (isset($_POST['keyword'])) {
        $keyword = $_POST['keyword'];
        $sql .= " and p.name like '%$keyword%'";
    }
    if (isset($_POST['size'])) {
        $size = $_POST['size'];
        if ($size > 0)
            $sql .= " and s.id = $size";
    }
    if (isset($_POST['color'])) {
        $color = $_POST['color'];
        if ($color > 0)
            $sql .= " and c.id = $color";
    }
    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
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