<?php
    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
    if (isset($_POST['month']) && isset($_POST['year'])) {
        $html = '<table class="table table-bordered">'
            .'<thead>'
                .'<tr>'
                    .'<th scope="col">#</th>'
                    .'<th scope="col">Tên sản phẩm</th>'
                    .'<th scope="col">Size</th>'
                    .'<th scope="col">Màu sắc</th>'
                    .'<th scope="col">Số lượng</th>'
                    .'<th scope="col">Đơn giá</th>'
                    .'<th scope="col">Tổng tiền</th>'
                .'</tr>'
            .'</thead>'
            .'<tbody>';
        $month = $_POST['month'];
        $year = $_POST['year'];
        $sql =  "SELECT p.name, s.size, c.color, ps.quantity, p.price, ps.size_id, ps.color_id, ps.quantity * p.price 'total'"
        ." FROM `saleorder` sa, product_saleorder ps, product p, color c, size s, user u" 
        ." WHERE sa.id = ps.saleorder_id and ps.product_id = p.id and ps.color_id = c.id and ps.size_id = s.id and sa.user_id = u.id"
        ." and month(sa.created_date) = $month and year(sa.created_date) = $year";
        $result = mysqli_query($con, $sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $price = number_format($row['price'], 0, '.', ',') . "đ";
            $total = number_format($row['total'], 0, '.', ',') . "đ";
            $html .= '<tr>'
                .'<td>'.$i.'</td>'
                .'<td>'.$row['name'].'</td>'
                .'<td>'.$row['size'].'</td>'
                .'<td>'.$row['color'].'</td>'
                .'<td>'.$row['quantity'].'</td>'
                .'<td>'.$price.'</td>'
                .'<td>'.$total.'</td>'
                .'</tr>';
            $i++;
        }
        echo $html . "</tbody></table>";
    }
    mysqli_close($con);
?>