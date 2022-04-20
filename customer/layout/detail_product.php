<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/detail_product.css">
    <script src="../js/jquery.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="/frontEndProject/js/detail_product.js"></script>
</head>
<body>
    <header class="sticky-top">
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
                    <div class="icon-user">
                        <i class="fal fa-user"></i>
                    </div>
                    <a class="icon-cart">
                        <i class="far fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
            <div class="category">
                <ul class="d-flex justify-content-around">
                    <li>
                        <a href="">GIÀY</a>
                    </li>
                    <li>
                        <a href="#">GIÀY</a>
                    </li>
                    <li>
                        <a href="#">GIÀY</a>
                    </li>
                    <li>
                        <a href="#">GIÀY</a>
                    </li>
                    <li>
                        <a href="#">GIÀY</a>
                    </li>
                    <li>
                        <a href="#">GIÀY</a>
                    </li>
                    <li>
                        <a href="#">GIÀY</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
    <main>
        <div class="contain_main d-flex">
            <div class="contain_image d-flex">
                <div class="contain_small_image d-flex flex-column">
                    <div class="small_image image1">
                        <img src="/frontEndProject/image/image1.jpeg" alt="" style="width: 100%;">
                    </div>
                    <div class="small_image image2">
                        <img src="/frontEndProject/image/image2.jpeg" alt="" style="width: 100%">
                    </div>
                    <div class="small_image image3">
                        <img src="/frontEndProject/image/image3.jpeg" alt="" style="width: 100%">
                    </div>
                    <div class="small_image image4">
                        <img src="/frontEndProject/image/image4.jpeg" alt="" style="width: 100%">
                    </div>
                </div>
                <div class="contain_big_image">
                    <img src="/frontEndProject/image/big_image.jpeg" alt="" style="width: 100%">
                </div>
            </div>
            <div class="contain_detail_product d-flex flex-column">
                <div class="title_product">
                    <h2>Giày Ananas</h2>
                </div>
                <div class="name_product">
                    <b>MONOGUSO - LOW TOP - MOONBEAM/GREEN</b>
                </div>
                <div class="id_product">
                    <b>SKU:</b>AV00119
                </div>
                <div class="price_product">
                    720,000<u>đ</u>  
                </div>
                <div class="size_amount d-flex">
                    <form action="">
                        <label for="size"><b>SIZE: </b></label>
                        <select name="size" id="size" style="padding: 5px; border-radius: 5px; border: 2px solid rgb(212, 212, 212);">
                            <option value="35" type="button">35</option>
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="42">42</option>
                            <option value="43">43</option>
                        </select>
                    </form>
                    <form action="" style="margin-left: 80px;">
                        <label for=""><b>Số lượng: </b></label>
                        <button id="minus" type="button" value="-" onclick="cal_amountProduct_minus()">-</button>
                        <input type="text" name="amount_product" id="amount_product" value="1">
                        <button id="plus" type="button" value="+" onclick="cal_amountProduct_plus()">+</button>
                    </form>
                </div>
                <div class="add_cart_buy d-flex">
                    <div class="add_cart">
                        <form action="">
                            <button>THÊM VÀO GIỎ HÀNG</button>
                        </form>
                    </div>
                   <div class="buy">
                    <form action="">
                        <button>MUA NGAY</button>
                    </form>
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
    <footer>
        <div class="container footer-container">
            <div>
                <ul>
                    <li>
                        <h2>À Shoes</h2>
                    </li>
                    <li class="title">
                        <h5>Cửa Hàng Thời Trang À Shoes</h5>
                    </li>
                    <li>
                        MST: 0303083083 Do Sở kế hoạch và Đầu tư TP.HCM cấp ngày 28/10/2015
                    </li>
                    <li>
                        Địa Chỉ: 36/9 Nguyễn Gia Trí, Phường 25, Quận Bình Thạnh, Thành phố Hồ Chí Minh, Việt Nam
                    </li>
                    <li>
                        Hotline: 1900 63 6641
                    </li>
                    <li>
                        Email: gosumo@havang.com
                    </li>
                    <li>
                        <img width="150px" title="GOSUMO.VN Đã Thông Báo Bộ Công Thương" alt="GOSUMO.VN Đã Thông Báo Bộ Công Thương" src="https://file.hstatic.net/1000366086/file/logosalenoti_33c2adb969af402c8aa3a6d01289f601.png">
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <h5>Thông tin cửa hàng</h5>
                    </li>
                    <li>
                        Giới thiệu
                    </li>
                    <li>
                        Liên hệ
                    </li>
                    <li>
                        Thương hiệu
                    </li>
                    <li>
                        Hệ thống cửa hàng
                    </li>
                    <li>
                        Chính sách giao nhận
                    </li>
                    <li>
                        Chính sách đổi trả
                    </li>
                </ul>
            </div>
            <div>
                <ul>
                    <li>
                        <h5>Hỗ trợ khách hàng</h5>
                    </li>
                    <li>
                        Hướng dẫn chọn size
                    </li>
                    <li>
                        Quy định & hình thức thanh toán
                    </li>
                    <li>
                        Hotline: 1900 63 6641
                    </li>
                    <li>
                        Email: gosumo@havang.com
                    </li>
                    <li>
                        <img width="150px" title="GOSUMO.VN Đã Thông Báo Bộ Công Thương" alt="GOSUMO.VN Đã Thông Báo Bộ Công Thương" src="https://file.hstatic.net/1000366086/file/logosalenoti_33c2adb969af402c8aa3a6d01289f601.png">
                    </li>
                </ul>
            </div>
        </div>
    </footer>
</body>
<script>
    $(document).on('input', '#toggle-modal', function () {
        if ($('#toggle-modal:checked').length == 0) {
            $('body').css('overflow', 'hidden');
            $('.modal-cart-container').css('visibility', 'visible');
            $('.modal-cart-container .cart').css('margin-right', '0');
        }
        else {
            $('body').css('overflow', 'auto');
            $('.modal-cart-container').css('visibility', 'hidden');
            $('.modal-cart-container .cart').css('margin-right', '-500px');
        }
    })
</script>
</html>