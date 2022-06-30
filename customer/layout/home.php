<?php
    session_start();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/header_footer.css">
    <link rel="stylesheet" href="../css/home.css">
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
    <?php
        if(isset($_GET['status'])){
            echo '<script>alert("Đặt hàng thành công")</script>';
        }
        include 'header.php'
    ?>
    <main class="container">
        <div class="banner">
            <img src="../images/banner.webp" alt="" width="100%">
        </div>
        <div class="main">
            <div class="category">
                <form action="" method="POST">
                    <!-- tim price -->
                    <div class="category-item">
                        <div class="category-title">
                            KHOẢNG GIÁ
                        </div>
                        <input type="range" name="category-title-price" id="category-title-price" onchange="getvalue()" min="100000" max="1000000" step="10000">
                        <input type="text" name="value" id="value" style="border: 2px solid grey; border-radius: 10px; width: 100px; padding-left: 10px;">
                    </div>
                    <!-- tim size -->
                    <div class="category-item">
                        <div class="category-title">
                            KÍCH CỠ
                        </div>
                        <?php
                            $con=mysqli_connect('localhost','root','12345678','projectphp');
                            $sql="select * from size where status=1";
                            $result=mysqli_query($con,$sql);
                            if(mysqli_num_rows($result)>0){
                                while($row=mysqli_fetch_assoc($result)){
                                    echo '<div class="category-option">';
                                    echo  '<input type="checkbox" name="size" id="'.$row['id'].'" value="'.$row['id'].'">';
                                    echo   '<label style="margin-left:10px;" for="'.$row['id'].'">'.$row['size'].'</label>';
                                    echo '</div>';
                                }
                            }
                            
                            ?>   
                            
                    </div>
                    <!-- tim color -->
                    <div class="category-item color">
                        <div class="category-title">
                            MÀU SẮC
                        </div>
                        <?php
                                $con=mysqli_connect('localhost','root','12345678','projectphp');
                                $sql="select * from color where status=1";
                                $result=mysqli_query($con,$sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_assoc($result)){
                                        echo '<div class="category-option">';
                                        echo '<input type="checkbox" name="color" id="'.$row['id'].'" value="'.$row['id'].'">
                                        <label for="'.$row['id'].'">'.$row['color'].'</label>';
                                        echo '</div>';
                                        
                                    }
                                }
                                $con->close();
                                ?>
                    </div>
                    <button type="submit" id="finding-product" >Tìm</button>
                    
                </form>
                    
            </div>
            <div class="right">
                <div class="product-title">
                    <?php
                        $con = mysqli_connect('localhost', 'root', '12345678', 'projectphp');
                        $sql="SELECT * FROM `category` WHERE id=".$_GET["id"];
                        $result=mysqli_query($con, $sql);
                        $row=mysqli_fetch_assoc($result);
                        if(isset($_GET['searchProduct'])){
                            echo "CÁC MẪU GIÀY CẦN TÌM";
                        }
                        else{
                            echo $row["name"] ;
                        }
                        
                        mysqli_close($con);

                    ?>
                </div>
                
                <div class="product">
                        <?php
                        $con = mysqli_connect('localhost', 'root', '12345678', 'projectphp');
                        $sql="SELECT DISTINCT p.image, p.name, p.price, p.id FROM `product` p join size_color sc on p.id=sc.product_id where status=1";
                        // hien thi cac san pham theo danh muc
                        if(isset($_GET["id"])){
                            $sql.=" and category_id=".$_GET["id"];
                            
                        }
                        if(isset($_GET['searchProduct'])){
                            $sql="SELECT * FROM `product` WHERE name LIKE N'%".$_GET["searchProduct"]."%'";
                        }
                        //tim kiem theo lua chon
                        //var_dump($_POST['size'],$_POST['value'],$_POST['color']);
                        if(isset($_POST['value'])){
                            if($_POST['size']!=null||$_POST['color']!=null){
                                $sql.=" and price<=".$_POST['value'];
                            }
                            else if($_POST['value']!=""){
                                $sql="SELECT DISTINCT p.image, p.name, p.price, p.id FROM `product` p join size_color sc on p.id=sc.product_id WHERE status=1 and price<=".$_POST['value'];
                            }
                        }
                        if(isset($_POST['size'])){
                            if($_POST['value']!=""||$_POST['color']!=null){
                                $sql.=" and size_id=".$_POST['size'];
                            }
                            else if($_POST['size']!=null){
                                $sql="SELECT DISTINCT p.image, p.name, p.price, p.id FROM `product` p join size_color sc on p.id=sc.product_id WHERE status=1 and size_id=".$_POST['size'];
                            }
                        }
                        if(isset($_POST['color'])){
                            if($_POST['value']!=""||$_POST['size']!=null){
                                $sql.=" and color_id=".$_POST['color'];
                            }
                            else if($_POST['color']!=null){
                                $sql="SELECT DISTINCT p.image, p.name, p.price, p.id FROM `product` p join size_color sc on p.id=sc.product_id WHERE status=1 and color_id=".$_POST['color'];
                            }
                        }
                        $result=mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo '<div class="product-item">';
                                echo '<a href="./detail_product.php?id='.$row["id"].'"><img src="'.$row["image"].'" alt="" width="100%">';
                                echo '<div class="product-item-name">'.$row["name"].'</div></a>';
                                echo '<div class="product-item-price">'.number_format($row['price']).'</div>';
                                echo '</div>';
                            }
                        }
                        else {
                            echo '<p style="margin-left: 30px; font-weight: 400; color: orange; font-size: 20px;">Không có sản phẩm</p>';
                        }
                        mysqli_close($con);
                        ?>
                        
                </div> 
            </div>
        </div>
    </main>
    
    <?php
        include 'footer.php'
    ?>
</body>
<script>
    function getvalue(){
        var x= document.getElementById('category-title-price').value;
        document.getElementById('value').value=x;
    }
    $(document).on('click', '#toggle-modal', function () {
        // if ($('#toggle-modal:checked').length == 0) {
        //     $('body').css('overflow', 'hidden');
        //     $('.modal-cart-container').css('visibility', 'visible');
        //     $('.modal-cart-container .cart').css('margin-right', '0');
        // }
        // else {
        //     $('body').css('overflow', 'auto');
        //     $('.modal-cart-container').css('visibility', 'hidden');
        //     $('.modal-cart-container .cart').css('margin-right', '-500px');
        // }
    
        document.location.href="./cart.php";
    })
</script>
</html>