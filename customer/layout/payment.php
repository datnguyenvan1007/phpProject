<?php
    session_start();
    $cart=(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    if(isset($_POST['name'])){
        $user_id=$_SESSION['user']['id'];
        $date=date('Y-m-d H:i:s');
        $con=mysqli_connect('localhost','root','12345678','projectphp');
        $sql="INSERT INTO `saleorder`(`id`, `created_date`, `user_id`) VALUES ('','$date','$user_id')";
        $query=mysqli_query($con,$sql);

        if($query){
            $saleorder_id=mysqli_insert_id($con);
            foreach($cart as $value){
                if($value!=0){
                    
                    $s="INSERT INTO `product_saleorder`(`saleorder_id`, `product_id`, `quantity`, `color_id`, `size_id`, `status`) 
                            VALUES ('$saleorder_id','$value[id]','$value[quantity]','$value[color_id]','$value[size_id]','1')";
                    mysqli_query($con, $s);
                }
            }
            unset($_SESSION['cart']);
            header('location:./home.php?status=1');
            
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link rel="stylesheet" href="../css/payment.css">
    <script src="../js/jquery.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    
</head>
<body>
    <main>
        <?php
            if(isset($_SESSION['user'])){
        ?>
        <form method="POST">
        <div class="contain_main d-flex">
            <div class="left_main">
                <h3>?? Shoes</h3>
                
                <h6>Th??ng tin thanh to??n</h6>
                
                <form  action="" class="left_main_form">
                    <table cellpadding="5px;">
                        <tr>
                             <td colspan="3">
                                 <input type="text" name="name" id="name" value="<?php echo $_SESSION['user']['name']?>" placeholder="H??? v?? t??n">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="text" name="phoneNumber" id="phoneNumber" value="<?php echo $_SESSION['user']['phoneNumber']?>" placeholder="??i???n tho???i">
                            </td>
                            <td colspan="1">
                                <input type="email" name="email" id="email" value="<?php echo $_SESSION['user']['email'] ?>" placeholder="Email">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <input type="text" name="address" id="address" value="<?php echo $_SESSION['user']['address'] ?>" placeholder="?????a ch???">
                            </td>
                        </tr>
                        
                        <tr>
                            <td>
                                <a href="./cart.php">Gi??? h??ng</a>
                            </td>
                            <td colspan="2">
                                <button type="submit" name="payment" id="payment"> ?????t H??ng</button>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="right_main">
                <table class="payment_product_list">
                     <?php
                            foreach($cart as $key => $value):
                                if($key!=0){
                        ?>
                    <tr>
                       
                        <td class="product_image">
                            <div class="product_thumbnail">
                                <div class="product_thumbnail_wrapper" >
                                    <img src="<?php echo $value['image'] ?>" alt="???nh s???n ph???m" style="width: 100%; border-radius: 5px;">
                                </div>
                               
                            </div>
                        </td>
                        <td>
                            <div><?php echo $value['name'] ?></div>
                            <div class="size_color">
                                <a href="#"><?php  $con=mysqli_connect('localhost','root','12345678','projectphp');
                                        $sql="select * from size where id=".$value['size_id'];
                                        $query=mysqli_query($con, $sql);
                                        if(mysqli_num_rows($query)>0){
                                            $row=mysqli_fetch_assoc($query);
                                            echo $row['size'];
                                        }
                                        $con->close(); ?></a> / <a href="#"><?php $con=mysqli_connect('localhost','root','12345678','projectphp');
                                        $sql="SELECT * FROM `color` WHERE id=".$value['color_id'];
                                        $query=mysqli_query($con, $sql);
                                        if(mysqli_num_rows($query)>0){
                                            $row=mysqli_fetch_assoc($query);
                                            echo $row['color'];
                                        }
                                        $con->close();
                                         ?></a>
                            </div>
                        </td>
                        <td>
                            <div class="price">
                                <a href="#"><?php echo number_format($value['price']*$value['quantity']) ?></a><sup>??</sup>
                            </div>
                        </td>
                    </tr>
                    <?php }
                        endforeach; ?>
                </table>
                <div class="under">
                    <table>
                        <thead>
                            <tr>
                                <th class="total_line_name">
                                    <span style="visibility: hidden;">M?? t???</span>
                                </th>
                                <th class="total_line_class">
                                    <span style="visibility: hidden;">G??a</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="total_line_name">T???m t??nh</td>
                                <td class="total_line_price">
                                    <span class="money"><?php echo number_format($_SESSION['total']) ?></span>
                                </td>
                            </tr>
                            <tr>
                                <td class="total_line_name">Ph?? ship</td>
                                <td class="total_line_price">
                                    <span class="">-</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="total_line_name">
                                    <span class="total_money">T???ng ti???n</span>
                                </td>
                                <td class="total_line_price">
                                    <span class="total_payment"><?php echo number_format($_SESSION['total']) ?></span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="note">
                        Sau khi ?????t h??ng th??nh c??ng, trong v??ng 24h nh??n vi??n CSKH s??? li??n h??? qu?? kh??ch
                         ????? x??c th???c th??ng tin ????n h??ng. L??u ??: Cu???c g???i x??c th???c th??ng tin ????n h??ng ch???
                          ??p d???ng cho l???n mua s???m ?????u ti??n c???a qu?? kh??ch. Qu?? kh??ch c?? nhu c???u Xu???t H??a 
                          ????n vui l??ng quay l???i GI??? H??NG v?? ??i???n th??ng tin v??o ph???n ghi ch??. M???i chi ti???t 
                          vui l??ng xin li??n h??? 1900 63 6641 ????? ???????c h??? tr??? th??m.
                    </div>
                </div>
                
            </div>
        </div>
        </form>
        <?php
            }
            
            else{$action=$_GET['action'];
                echo '<strong>Vui l??ng ????ng nh???p: </strong><a href="./login.php?action='.$action.'" style="text-decoration: none;">Login</a>';
                }
        ?>
    </main>
</body>
<script>
    $(document).on('input', '#toggle-modal', function () {
        document.location.href="./cart.php";
    })
</script>

</html>