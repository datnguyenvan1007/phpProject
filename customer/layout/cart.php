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
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">	
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
    <header>
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
                                <button>-</button>
                                <input type="text" class="quantity-input" value="1" readonly>
                                <button>-</button>
                            </div>
                            <div class="price">
                                1,190,000đ
                            </div>
                        </div>
                    </div>
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
                    <div class="icon-user">
                        <i class="fal fa-user"></i>
                    </div>
                    <label for="toggle-modal">
                        <div class="icon-cart position-relative">
                            <i class="far fa-shopping-cart"></i>
                            <div class="cart-index position-absolute">9</div>
                        </div>
                    </label>
                </div>
            </div>
            <div class="category">
                <ul class="d-flex justify-content-around">
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
                    <li>
                        <a href="#">GIÀY</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>
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
                    <tr>
                        <td class="image">
                            <img src="../images/u_appiano_g_c9999_0_ffb384e676414958b9353f01f5b1e67b_3e43b632c6e84e2fbe9c31ceeb93f8ea_large.webp" alt="" width="100%">
                        </td>
                        <td class="product-info">
                            <div class="product-name">
                                <a href="#">
                                    Giày Tây Nam GEOX U Sirmione A
                                </a>
                            </div>
                            <div class="breadcrumb">
                                <div class="size breadcrumb-item">
                                    39
                                </div>
                                <div class="color breadcrumb-item">
                                    BLUE
                                </div>
                            </div>
                            <div class="delete-cart-item">
                                Xóa
                            </div>
                        </td>
                        <td class="price">350,000</td>
                        <td class="quantity">
                            <div class="btn-group">
                                <button type="button" value="-">-</button>
                                <input type="text" class="quantity-input" value="1" readonly>
                                <button type="button" value="+">-</button>
                            </div>
                        </td>
                        <td class="subtotal-price">350,000</td>
                    </tr>
                </tbody>
            </table>
            <div class="main-bottom">
                <div class="left form-group">
                    <label for="note">Chú thích cho cửa hàng</label>
                    <textarea name="note" id="note" cols="30" rows="4" class="form-control"></textarea>
                </div>
                <div class="right">
                    <div class="total-price">
                        4,000,000
                    </div>
                    <div class="button">
                        <button type="button" class="btn btn-outline-dark">Cập nhật</button>
                        <button type="button" class="btn btn-outline-dark">Thanh toán</button>
                    </div>
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