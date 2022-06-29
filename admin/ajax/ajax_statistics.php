<?php
    $data = array();
    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
    for ($i = 1; $i <= 12; $i++) {
        $result = mysqli_query($con, "select sum(quantity * price) 'sum' from saleorder s join product_saleorder ps on s.id = ps.saleorder_id join product p on ps.product_id = p.id where month(s.created_date) = $i group by month(s.created_date)");
        $row = mysqli_fetch_assoc($result);
        array_push($data, (int)$row['sum']);
    }
    mysqli_close($con);
    echo json_encode($data);
?> 