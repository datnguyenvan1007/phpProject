<?php
    session_start();
    $cart=(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    // echo "<pre>";
    // print_r($cart);
    
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ hàng</title>
    <link rel="stylesheet" href="../css/cart.css">
    <link rel="stylesheet" href="../css/header_footer.css">

    <script src="../js/jquery.js"></script>
    <script src="../js/cart.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
   <?php
        include 'header.php'
        
   ?>
    <main>
        <div class="container">
            <div class="main-top">
                <h2>GIỎ HÀNG</h2>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <td class="image"></td>
                        <td class="product-info">Thông tin chi tiết sản phẩm</td>
                        <td class="price">Đơn giá</td>
                        <td class="quantity">Số lượng</td>
                        <td class="subtotal-price">Tổng giá</td>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php
                        $_SESSION['total']=0;
                        
                        foreach($cart as $key => $value):
                            
                            if($key!=0){
                                
                    ?>
                    <tr>
                        <td class="image">
                            <img src="<?php echo $value['image'] ?>" alt="" width="100%">
                        </td>
                        <td class="product-info">
                            <div class="product-name">
                                <a href="./detail_product.php?id=<?php echo $value['id'] ?>">
                                    <?php echo $value['name'] ?>
                                </a>
                            </div>
                            <div class="breadcrumb">

                                <div class="size breadcrumb-item">
                                    <?php
                                        $con=mysqli_connect('localhost','root','12345678','projectphp');
                                        $sql="select * from size where id=".$value['size_id'];
                                        $query=mysqli_query($con, $sql);
                                        if(mysqli_num_rows($query)>0){
                                            $row=mysqli_fetch_assoc($query);
                                            echo $row['size'];
                                        }
                                        $con->close();
                                    ?>
                                </div>
                                <div class="color breadcrumb-item">
                                    <?php
                                        
                                        $con=mysqli_connect('localhost','root','12345678','projectphp');
                                        $sql="SELECT * FROM `color` WHERE id=".$value['color_id'];
                                        $query=mysqli_query($con, $sql);
                                        if(mysqli_num_rows($query)>0){
                                            $row=mysqli_fetch_assoc($query);
                                            echo $row['color'];
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="delete-cart-item">
                                <a href="./cart_processing.php?key=<?php echo $key?>&action=delete">Xóa</a>
                                
                            </div>
                        </td>
                        <td class="price"><?php echo number_format($value['price'])?></td>
                        <td class="quantity">
                            <div class="btn-group" style="display:flex ; flex-direction: column;">
                                
                                <input type="text" name="quantity-input" id="<?php $value['id']; ?>" value="<?php echo $value['quantity']; ?>" readonly style="cursor: pointer;">
                                <?php
                                
                                    if(isset($value['full'])){?>
                                        <input type="text" name="quantity-input" style="border: none; font-size: small; width: fit-content; color: red;" id="<?php $value['id']; ?>" value="<?php echo "Chỉ còn: " .$value['full']." sản phẩm";?>" readonly style="cursor: pointer;">
                                     <?php   
                                    }
                                ?>
                            </div>
                        </td>
                        <td class="subtotal-price">
                            <?php
                            $_SESSION['total']+= ($value['price']*$value['quantity']); 
                             echo number_format($value['price']*$value['quantity']);
                             ?>
                        </td>
                    </tr>
                    <?php }endforeach;?>
                </tbody>
            </table>
            <div class="main-bottom">
                
                <div class="right">
                    <div class="total-price">
                        <?php
                            echo number_format($_SESSION['total']);
                        ?>
                    </div>
                    <div class="button">
                        
                        <a href="./payment.php?action=payment"><button type="button" class="btn btn-outline-dark">Thanh toán</button></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        include 'footer.php'
    ?>
</body>
<script>
    $('#update').on('click',function(){
        document.location.href='./cart.php';
    })
    function cal_amountProduct_plus(){
        var temp=parseInt($('[name="quantity-input"]').val());
        print_r(temp);
        temp+=1;
        document.getElementById("quantity_value").value=temp;
    }
    function cal_amountProduct_minus(){
        var temp=parseInt(document.getElementById("quantity_value").value);
        if(temp>=2){
            temp-=1;
        }
        document.getElementById("quantity_value").value=temp;
    }
    $(document).on('input', '#toggle-modal', function () {
        document.location.href="./cart.php";
    })
</script>
</html>