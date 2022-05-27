<?php
    if (isset($_POST['option'])) {
        $option = $_POST['option'];
        $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
        $html = "";
        switch ($option) {
            case 1:
                $html .= '<thead>'
                    .'<tr>'
                        .'<th>Danh mục</th>'
                        .'<th>Số lượng</th>'
                    .'</tr>'
                    .'</thead>'
                    .'<tbody>';
                $result = mysqli_query($con, "SELECT c.name, SUM(sc.quantity) 'sum' from category c JOIN product p on c.id = p.category_id JOIN size_color sc ON sc.product_id = p.id GROUP BY c.name");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>"
                            ."<td>".$row['name']."</td>"
                            ."<td>".$row['sum']."</td>"
                        ."</tr>";
                    }
                }
                $result = mysqli_query($con, "SELECT c.name, SUM(sc.quantity) 'sum' from category c JOIN product p on c.id = p.category_id JOIN size_color sc ON sc.product_id = p.id");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>"
                            ."<th>Tổng</th>"
                            ."<th>".$row['sum']."</th>"
                        ."</tr>";
                    }
                }
                break;
            case 2:
                $html .= '<thead>'
                    .'<tr>'
                        .'<th>Sản phẩm</th>'
                        .'<th>Số lượng</th>'
                    .'</tr>'
                    .'</thead>'
                    .'<tbody>';
                $result = mysqli_query($con, "SELECT p.name, SUM(sc.quantity) 'sum'  from product p JOIN size_color sc ON sc.product_id = p.id GROUP BY p.name");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>"
                            ."<td>".$row['name']."</td>"
                            ."<td>".$row['sum']."</td>"
                        ."</tr>";
                    }
                }
                $result = mysqli_query($con, "SELECT p.name, SUM(sc.quantity) 'sum'  from product p JOIN size_color sc ON sc.product_id = p.id");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>"
                            ."<th>Tổng</th>"
                            ."<th>".$row['sum']."</th>"
                        ."</tr>";
                    }
                }
                break;
            case 3:
                $html .= '<thead>'
                    .'<tr>'
                        .'<th>Màu sắc</th>'
                        .'<th>Số lượng</th>'
                    .'</tr>'
                    .'</thead>'
                    .'<tbody>';
                $result = mysqli_query($con, "SELECT c.color, SUM(sc.quantity) 'sum'  from color c JOIN size_color sc ON c.id = sc.color_id GROUP BY c.color");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>"
                            ."<td>".$row['color']."</td>"
                            ."<td>".$row['sum']."</td>"
                        ."</tr>";
                    }
                }
                $result = mysqli_query($con, "SELECT c.color, SUM(sc.quantity) 'sum'  from color c JOIN size_color sc ON c.id = sc.color_id");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>"
                            ."<th>Tổng</th>"
                            ."<th>".$row['sum']."</th>"
                        ."</tr>";
                    }
                }
                break;
            case 4:
                $html .= '<thead>'
                    .'<tr>'
                        .'<th>Size</th>'
                        .'<th>Số lượng</th>'
                    .'</tr>'
                    .'</thead>'
                    .'<tbody>';
                $result = mysqli_query($con, "SELECT s.size, SUM(sc.quantity) 'sum'  from size s JOIN size_color sc ON s.id = sc.size_id GROUP BY s.size");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>"
                            ."<td>".$row['size']."</td>"
                            ."<td>".$row['sum']."</td>"
                        ."</tr>";
                    }
                }
                $result = mysqli_query($con, "SELECT s.size, SUM(sc.quantity) 'sum'  from size s JOIN size_color sc ON s.id = sc.size_id");
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $html .= "<tr>"
                            ."<th>Tổng</th>"
                            ."<th>".$row['sum']."</th>"
                        ."</tr>";
                    }
                }
                break;
        }
        $html .= '</tbody>';
        echo $html;
        mysqli_close($con);
    }
?>