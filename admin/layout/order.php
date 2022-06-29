<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa Đơn</title>
    <?php include "lib.php";?>
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
                    <h2>Danh Sách Hóa Đơn</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-2">
                            <label for="status">Trạng thái:</label>
                            <select name="status" id="status" class="form-control">
                                <option value="3">Tất cả</option>
                                <option value="0">Đã hủy</option>
                                <option value="1">Chờ xác nhận</option>
                                <option value="2">Đã xác nhận</option>
                            </select>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Size</th>
                                <th scope="col">Màu sắc</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thời gian</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                            $sql = "SELECT sa.id, u.fullname, p.name, s.size, c.color, ps.quantity, sa.created_date, ps.size_id, ps.color_id, ps.product_id,"
                            ." CASE WHEN ps.status = 0 THEN 'Đã hủy' WHEN ps.status = 1 THEN 'Chờ xác nhận' WHEN ps.status = 2 THEN 'Đã xác nhận' END AS status"
                            ." FROM `saleorder` sa, product_saleorder ps, product p, color c, size s, user u" 
                            ." WHERE sa.id = ps.saleorder_id and ps.product_id = p.id and ps.color_id = c.id and ps.size_id = s.id and sa.user_id = u.id"
                            ." ORDER BY sa.created_date DESC";
                            $result = mysqli_query($con, $sql);
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<tr>'
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
                                        echo '<button type="button" class="btn btn-primary mr-2 confirm">Xác nhận</button>'
                                        .'<button type="button" class="btn btn-danger delete">Hủy</button>';
                                    else 
                                        echo '<button type="button" class="btn btn-primary mr-2 confirm" disabled>Xác nhận</button>'
                                        .'<button type="button" class="btn btn-danger delete" disabled>Hủy</button>';
                                    echo '</td>'
                                    .'</tr>';
                                }
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
    $(document).on('change', '#status', function () {
        var status = $('#status').val();
        $.ajax({ 
            data: {
                status: status
            },
            url: "../ajax/ajax_order.php",
            type: 'post',
            success: function(html){
                $('tbody').html(html);
            }
        });
    })

    $(document).on('click', '.confirm', function () {
        var con =  confirm('Bạn có muốn xác nhận hóa đơn này không!');
        var tr = $(this);
        var id = $(this).closest('tr').find('td:first-child').html();
        var productId = $(this).closest('tr').find('td:nth-child(3)').attr('productId');
        var sizeId = $(this).closest('tr').find('td:nth-child(4)').attr('sizeId');
        var colorId = $(this).closest('tr').find('td:nth-child(5)').attr('colorId');
        var quantity = $(this).closest('tr').find('td:nth-child(6)').html();
        id = parseInt(id);
        sizeId = parseInt(sizeId);
        colorId = parseInt(colorId);
        productId = parseInt(productId);
        quantity = parseInt(quantity);
        if (con) {
            $.ajax({ 
                data: {
                    option: 2,
                    saleorderId: id,
                    productId: productId,
                    sizeId: sizeId,
                    colorId: colorId,
                    quantity: quantity
                },
                url: "../ajax/ajax_order_btn.php",
                type: 'post',
                success: function(html){
                    if (html == "") {
                        $(tr).closest('tr').find('td button').attr('disabled', 'true');
                        $(tr).closest('tr').find('td:nth-child(8)').html('Đã xác nhận');
                    }
                    else 
                        alert(html);
                }
            });
        }
    })

    $(document).on('click', '.delete', function () {
        var con =  confirm('Bạn có muốn hủy hóa đơn này không!');
        var tr = $(this);
        var id = $(this).closest('tr').find('td:first-child').html();
        var productId = $(this).closest('tr').find('td:nth-child(3)').attr('productId');
        var sizeId = $(this).closest('tr').find('td:nth-child(4)').attr('sizeId');
        var colorId = $(this).closest('tr').find('td:nth-child(5)').attr('colorId');
        var quantity = $(this).closest('tr').find('td:nth-child(6)').html();
        id = parseInt(id);
        sizeId = parseInt(sizeId);
        colorId = parseInt(colorId);
        productId = parseInt(productId);
        quantity = parseInt(quantity);
        if (con) {
            $.ajax({ 
                data: {
                    option: 0,
                    saleorderId: id,
                    productId: productId,
                    sizeId: sizeId,
                    colorId: colorId,
                    quantity: quantity
                },
                url: "../ajax/ajax_order_btn.php",
                type: 'post',
                success: function(html){
                    console.log(html);
                    $(tr).closest('tr').find('td button').attr('disabled', 'true');
                    $(tr).closest('tr').find('td:nth-child(8)').html('Đã hủy');
                }
            });
        }
    })
</script>
</html>