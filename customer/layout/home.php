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
        include 'header.php'
    ?>
    <main class="container">
        <div class="banner">
            <img src="../images/banner.webp" alt="" width="100%">
        </div>
        <div class="main">
            <div class="category">
                
                <div class="category-item">
                    
                    <div class="category-title">
                        KHOẢNG GIÁ
                    </div>
                    
                    <form action="" method="POST">
                        <input type="range" name="category-title-price" id="category-title-price" onchange="getvalue()" min="100000" max="1000000" step="10000">
                        <input type="text" name="value" id="value" style="border: 2px solid grey; border-radius: 10px; width: 100px; padding-left: 10px;">
                        <button type="submit" id="finding-product" >Tìm</button>
                    </form>
                </div>
                <div class="category-item">
                    <div class="category-title">
                        KÍCH CỠ
                    </div>
                    <div class="category-option">
                        <input type="checkbox" name="size" id="size1">
                        <label for="size1">Tất cả</label>
                    </div>
                    <div class="category-option">
                        <input type="checkbox" name="size" id="size2" value="41">
                        <label for="size2">41</label>
                    </div>
                </div>
                <div class="category-item color">
                    <div class="category-title">
                        MÀU SẮC
                    </div>
                    <div class="category-option">
                        <input type="checkbox" name="color" id="color1">
                        <label for="color1">Bạc</label>
                    </div>
                    <div class="category-option">
                        <input type="checkbox" name="color" id="color2">
                        <label for="color2">Đen</label>
                    </div>
                </div>
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
                        $sql="SELECT * FROM `product` ";
                        if(isset($_GET["id"])){
                            $sql.="where category_id=".$_GET["id"];
                            
                        }
                        if(isset($_GET['searchProduct'])){
                            $sql="SELECT * FROM `product` WHERE name LIKE N'%".$_GET["searchProduct"]."%'";
                        }
                        if(isset($_POST['value'])){
                            $sql="SELECT * FROM `product` WHERE price<=".$_POST['value'];
                        }
                        $result=mysqli_query($con, $sql);
                        if(mysqli_num_rows($result)>0){
                            while($row=mysqli_fetch_assoc($result)){
                                echo '<div class="product-item">';
                                echo '<a href="./detail_product.php?id='.$row["id"].'"><img src="'.$row["image"].'" alt="" width="100%">';
                                echo '<div class="product-item-name">'.$row["name"].'</div></a>';
                                echo '<div class="product-item-price">'.$row['price'].'</div>';
                                echo '</div>';
                            }
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