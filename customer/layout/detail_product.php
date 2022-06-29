<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail_products</title>
    <link rel="stylesheet" href="../css/header_footer.css">
    <link rel="stylesheet" href="../css/detail_product.css">
    <script src="../js/jquery.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="../js/detail_product.js"></script>
</head>
<body>
    <?php
        include 'header.php'
    ?>
    <main>

        <input type="hidden" name="product-id" value="<?php echo $_GET["id"]; ?>" />
        <div class="contain_main d-flex">
            
            <div class="contain_image d-flex">
                
                <?php
                    $con=mysqli_connect('localhost','root','12345678','projectphp');
                    $sql="SELECT p.id, p.name 'pr', p.image, p.price, c.name FROM `product` p join category c on p.category_id=c.id WHERE status=1 and p.id=".$_GET["id"];
                    $result=mysqli_query($con,$sql);
                    if(mysqli_num_rows($result)>0){
                        $row=mysqli_fetch_assoc($result);
                            echo '<div class="contain_big_image">
                            <img src="'.$row["image"].'" alt="" style="width: 100%"></div>' ;
                ?>
                
            </div>
            <div class="contain_detail_product d-flex flex-column">
                <div class="title_product">
                    <h2><?php echo $row["name"]?></h2>
                </div>
                <div class="name_product">
                    <b><?php echo $row["pr"] ?></b>
                </div>
                <div class="id_product">
                    <input type="text" name="id" id="id" hidden value=<?php echo $row["id"];?>>
                    <b>SKU:</b><?php echo $row["id"]?>
                </div>
                <div class="price_product">
                    <?php echo number_format($row["price"]) ?><u>đ</u>  
                </div>
                <?php

                 }
                
                mysqli_close($con);
                ?>
                <div class="size_amount d-flex">
                    <form action="">
                        <label for="size"><b>SIZE: </b></label>
                        <select name="size" id="size" style="padding: 5px; border-radius: 5px; border: 2px solid rgb(212, 212, 212);">
                            <?php
                            $con=mysqli_connect('localhost','root','12345678','projectphp');
                            $sql="SELECT DISTINCT size_id, size FROM size_color sc join size s on sc.size_id=s.id WHERE sc.status=1 and sc.product_id=".$_GET["id"];
                            $result=mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    echo '<option value="'.$row["size_id"].'">'.$row["size"].'</option>';
                                }}
                            mysqli_close($con);
                            ?>
                           
                        </select>
                    </form>
                    <form action="" style="margin-left: 80px;">
                        <label for=""><b>Số lượng: </b></label>
                        <button id="minus" type="button" value="-" onclick="cal_amountProduct_minus()">-</button>
                        <input type="text" name="amount_product" id="amount_product" value="1" readonly style="cursor: pointer;">
                        <button id="plus" type="button" value="+" onclick="cal_amountProduct_plus()">+</button>
                    </form>
                </div>
                <div class="product_color">
                    <label for="color"><b>Màu: </b></label>
                    <select name="color" id="color" style="padding: 5px; border-radius: 5px; border: 2px solid rgb(212, 212, 212);">
                        <?php
                        $con=mysqli_connect('localhost','root','12345678','projectphp');
                        
                        $sql="SELECT * FROM `size_color` sc join color c on sc.color_id=c.id WHERE sc.status=1 and product_id=".$_GET['id']." LIMIT 1";
                        $result=mysqli_query($con,$sql);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo '<option value="'.$row["color_id"].'">'.$row["color"].'</option>';
                                
                            }}
                            mysqli_close($con);
                            ?>
                        
                        
                    </select>
                </div>
                <div class="add_cart_buy d-flex">
                    <div class="add_cart">
                        <button type="button" class="btn_redirect">THÊM VÀO GIỎ HÀNG</button>
                    </div>
                   <div class="buy">
                    <!-- <form action="">
                        <button>MUA NGAY</button>
                    </form> -->
                   </div>
                </div>
                <div class="suggest_product">
                    <ul>
                        <li>Gọi <b>1900 63 6641</b> để mua hàng nhanh hơn</li>
                        <li>Miễn phí giao hàng từ 800.000<u>đ</u></li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <?php
        include 'footer.php';
    ?>
</body>
<script>
    $('#size').on('change',function(){
        let size=$('#size').val();
        
        let productId = $('[name="product-id"]').val();
        
        $.ajax({
            url: './ajax-get-size.php?size=' + size + "&productId=" + productId,
            success: function(result){
                document.querySelector('#color').innerHTML= result;
            }
        })
    })
    
    $('.btn_redirect').on('click', function () {
        
        var amount = $('#amount_product').val();
        var size = $('#size').val();
        var color=$('#color').val();    
        var id = $('#id').val();
        document.location.href = './cart_processing.php?id=' + id + '&size= ' + size + '&color=' + color + '&amount=' + amount+ '&action=add';
        
        
    })
    $(document).on('input', '#toggle-modal', function () {
        document.location.href="./cart.php";
    })
</script>
</html>