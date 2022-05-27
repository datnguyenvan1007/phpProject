<?php
    session_start();
    $count=0;
    $cart=(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
    function total_product($cart){
        $total=0;
        foreach ($cart as $key => $value) {
            if($key!=0)
                $total+=$value['quantity'];
        }
        return $total;
    }
    
?>
<header>
        <input type="checkbox" id="toggle-modal" hidden checked>
        <div class="modal-cart-container">
            <label for="toggle-modal">
                <div class="cart-overlay"></div>
            </label>
            <!-- giohang -->
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
                    <a href="./payment.php"><button type="button">Thanh toán <i class="fas fa-angle-right"></i></button></a>
                    
                </div>
            </div>
        </div>
        <div class="container">
            <div class="logo-search-icon d-flex justify-content-between align-items-center">
                <div class="search d-flex align-items-center">
                    <form action="" method="get">
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
                            
                            <?php 
                                if(isset($_SESSION['user'])){
                                    echo '<li style="color: black;">'.$_SESSION['user']['email'].'</li>';
                                    echo '<li><a href="./login.php">Đăng Xuất</a></li>';
                                }
                                
                                else{
                                    echo '<li><a href="./login.php">Đăng nhập</a></li>';
                                    echo '<li><a href="./register.php">Đăng ký</a></li>';
                                }
                            ?>
                            
                        </ul>
                        
                    </div>
                    <label for="toggle-modal">
                        <div class="icon-cart position-relative">
                            <i class="far fa-shopping-cart"></i>
                            <div class="cart-index position-absolute"><?php 
                            
                            echo total_product($cart); 
                            ?></div>
                            
                        </div>
                    </label>
                    
                        </div>
            </div>
            <?php
                include 'category.php'
            ?>
        </div>
    </header>