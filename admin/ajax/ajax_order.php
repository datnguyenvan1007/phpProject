<?php
    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
    $sql = "SELECT sa.id, u.fullname, p.name, s.size, c.color, ps.quantity, sa.created_date, ps.size_id, ps.color_id,"
        ." CASE WHEN ps.status = 0 THEN 'Đã hủy' WHEN ps.status = 1 THEN 'Chờ xác nhận' WHEN ps.status = 2 THEN 'Đã xác nhận' END AS status"
        ." FROM `saleorder` sa, product_saleorder ps, product p, color c, size s, user u" 
        ." WHERE sa.id = ps.saleorder_id and ps.product_id = p.id and ps.color_id = c.id and ps.size_id = s.id and sa.user_id = u.id";
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
        if ($status != 3)
            $sql .= " and ps.status = $status";
    }
    if (isset($_POST['id']) && isset($_POST['saleorderId']) && isset($_POST['sizeId']) && isset($_POST['colorId']) && isset($_POST['productId']) && isset($_POST['quantity'])) {
        $id = $_POST['id'];
        $saleorderId = $_POST['saleorderId'];
        $productId = $_POST['productId'];
        $sizeId = $_POST['sizeId'];
        $colorId = $_POST['colorId'];
        $quantity = $_POST['quantity'];
        $result = mysqli_query($con, "select * from size_color where product_id = $productId AND size_id = $sizeId AND color_id = $colorId");
        $row = mysqli_fetch_assoc($result);
        $quantityOld = $row['quantity'];
        if ($id == 2 && $quantityOld >= $quantity) {
            $quantity = $quantityOld - $quantity;
            mysqli_query($con, "UPDATE `size_color` SET `quantity`= $quantity WHERE product_id = $productId AND size_id = $sizeId AND color_id = $colorId");
        }
        mysqli_query($con, "UPDATE product_saleorder SET status = $id WHERE saleorder_id = $saleorderId AND product_id = $productId AND size_id = $sizeId AND color_id = $colorId");
    }
    $result = mysqli_query($con, $sql);
    $html = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>'
            .'<td>'.$row['id'].'</td>'
            .'<td>'.$row['fullname'].'</td>'
            .'<td>'.$row['name'].'</td>'
            .'<td sizeId = '. $row['size_id'] .'>'.$row['size'].'</td>'
            .'<td colorId = '. $row['color_id'] .'>'.$row['color'].'</td>'
            .'<td>'.$row['quantity'].'</td>'
            .'<td>'.$row['created_date'].'</td>'
            .'<td>'.$row['status'].'</td>'
            .'<td>'
                .'<button type="button" class="btn btn-primary mr-2 confirm">Xác nhận</button>'
                .'<button type="button" class="btn btn-danger delete">Hủy</button>'
            .'</td>'
            .'</tr>';
        }
    }
    echo $html;
    mysqli_close($con);
?>