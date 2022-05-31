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
    <!-- <header>
        <input type="checkbox" id="toggle-modal" hidden checked>
        <div class="modal-cart-container">
            <label for="toggle-modal">
                <div class="cart-overlay"></div>
            </label>
            <div class="cart">
                <div class="cart-header">
                    <h4>Giỏ hàng</h4>
                    <label for="toggle-modal">
                        <i class="fas fa-times close"></i>
                    </label>
                </div>
                <div class="cart-product">
                    <div class="image">
                        <img src="../images/u_appiano_g_c9999_0_ffb384e676414958b9353f01f5b1e67b_3e43b632c6e84e2fbe9c31ceeb93f8ea_large.webp" alt="" width="100%">
                    </div>
                    <div class="info">
                        <div class="product-name">
                            Giày thể thao Sneakers
                        </div>
                        <div class="product-quantity-price">
                            <div class="quantity btn-group">
                                <button type="button" value="-">-</button>
                                <input type="text" class="quantity-input" value="1" readonly>
                                <button type="button" value="+">+</button>
                            </div>
                            <div class="price">
                                1,190,000đ
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart-footer">
                    <label for="note">
                        Ghi chú hoặc Điền thông tin Xuất Hóa Đơn (Nếu có)
                    </label>
                    <textarea name="note" id="note" cols="40" rows="5"></textarea>
                    <div class="d-flex justify-content-between">
                        <div>Tổng tiền</div>
                        <div class="total-price">350,000</div>
                    </div>
                    <div class="cart-footer-note">
                        Phí vận chuyển được tính tại bước thanh toán
                    </div>
                    <button type="button">Thanh toán <i class="fas fa-angle-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="logo-search-icon d-flex justify-content-between align-items-center">
                <div class="search d-flex align-items-center">
                    <form action="">
                        <input type="text" name="searchProduct" id="searchProduct" placeholder="Nhập từ khóa tìm kiếm...">
                    </form>
                    <i class="fas fa-search"></i>
                </div>
                <div class="logo">
                    À Shoes
                </div>
                <div class="icon d-flex justify-content-between">
                    <div class="icon-user position-relative">
                        <i class="fal fa-user"></i>
                        <ul class="position-absolute">
                            <li>
                                <a href="./login.html">Đăng nhập</a>
                            </li>
                            <li>
                                <a href="./register.html">Đăng ký</a>
                            </li>
                        </ul>
                    </div>
                    <label for="toggle-modal">
                        <div class="icon-cart position-relative">
                            <i class="far fa-shopping-cart"></i>
                            <div class="cart-index position-absolute">0</div>
                        </div>
                    </label>
                </div>
            </div>
            
        </div>
    </header> -->
    
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
                    <div class="category-item">
                        <div class="category-title">
                            KHOẢNG GIÁ
                        </div>
                        <input type="range" name="category-title-price" id="category-title-price" onchange="getvalue()" min="100000" max="1000000" step="10000">
                        <input type="text" name="value" id="value" style="border: 2px solid grey; border-radius: 10px; width: 100px; padding-left: 10px;">
                    </div>
                    <div class="category-item">
                        <div class="category-title">
                            KÍCH CỠ
                        </div>
                        <?php
                            $con=mysqli_connect('localhost','root','12345678','projectphp');
                            $sql="select * from size";
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
                    <div class="category-item color">
                        <div class="category-title">
                            MÀU SẮC
                        </div>
                        <?php
                                $con=mysqli_connect('localhost','root','12345678','projectphp');
                                $sql="select * from color";
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
                        $sql="SELECT * FROM `product` ";
                        if(isset($_GET["id"])){
                            $sql.="where category_id=".$_GET["id"];
                            
                        }
                        if(isset($_GET['searchProduct'])){
                            $sql="SELECT * FROM `product` WHERE name LIKE N'%".$_GET["searchProduct"]."%'";
                        }
                        if(isset($_POST['value'])){
                            $sql="SELECT DISTINCT p.image, p.name, p.price, p.id FROM `product` p join size_color sc on p.id=sc.product_id WHERE price<=".$_POST['value'];
                            if(isset($_POST['size'])){
                                if($_POST['size']!=0){
                                     $sql.=" and size_id=".$_POST['size'];
                                }
                                
                                if(isset($_POST['color'])){
                                    if($_POST['color']!=0){

                                        $sql.=" and color_id=".$_POST['color'];
                                    }
                                }
                                    
                            }
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