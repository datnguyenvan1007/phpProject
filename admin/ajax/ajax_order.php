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
    $result = mysqli_query($con, $sql);
    $html = '';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>'
            .'<td>'.$row['id'].'</td>'
            .'<td>'.$row['fullname'].'</td>'
            .'<td productId = ' . $row['product_id'] .'>'.$row['name'].'</td>'
            .'<td sizeId = '. $row['size_id'] .'>'.$row['size'].'</td>'
            .'<td colorId = '. $row['color_id'] .'>'.$row['color'].'</td>'
            .'<td>'.$row['quantity'].'</td>'
            .'<td>'.$row['created_date'].'</td>'
            .'<td>'.$row['status'].'</td>'
            .'<td>';
            if ($row['status'] == 'Chờ xác nhận')
                $html .= '<button type="button" class="btn btn-primary mr-2 confirm">Xác nhận</button>'
                .'<button type="button" class="btn btn-danger delete">Hủy</button>';
            else 
                $html .= '<button type="button" class="btn btn-primary mr-2 confirm" disabled>Xác nhận</button>'
                .'<button type="button" class="btn btn-danger delete" disabled>Hủy</button>';
            $html .= '</td>'
            .'</tr>';
        }
    }
    echo $html;
    mysqli_close($con);
?>