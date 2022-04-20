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
        <div class="contain_main d-flex">
            <div class="left_main">
                <h3>GOSUMO.VN</h3>
                <div class="payment_method">
                    <a href="#">Giỏ hàng</a> > <a href="#">Thông tin vận chuyển</a> > <a href="#">Phương thức thanh toán</a>
                </div>
                <h6>Thông tin thanh toán</h6>
                <div class="account">
                    Bạn đã có tài khoản?
                    <a href="#">Đăng nhập</a>
                </div>
                <form  action="" class="left_main_form">
                    <table cellpadding="5px;">
                        <tr>
                            <td colspan="3"><input type="text" name="name" id="name" placeholder="Họ và tên"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="email" name="email" id="email" placeholder="Email"></td>
                            <td><input type="text" name="phoneNumber" id="phoneNumber" placeholder="Điện thoại"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="text" name="address" id="address" placeholder="Địa chỉ"></td>
                        </tr>
                        <tr>
                            <td>
                                <select name="province" id="province">
                                    <option value="0">Chọn tỉnh thành</option>
                                </select>
                            </td>
                            <td>
                                <select name="district" id="district" >
                                    <option value="0">Chọn Quận/Huyện</option>
                                </select>
                            </td>
                            <td>
                                <select name="ward" id="ward" >
                                    <option value="0">Chọn Phường</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a href="#">Giỏ hàng</a>
                            </td>
                            <td colspan="2">
                                <input type="button" name="payment" id="payment" value="Phương thức thanh toán">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="right_main">
                <table class="payment_product_list">
                    <tr>
                        <td class="product_image">
                            <div class="product_thumbnail">
                                <div class="product_thumbnail_wrapper" >
                                    <img src="../images/image1.jpeg" alt="ảnh sản phẩm" style="width: 100%; border-radius: 5px;">
                                </div>
                               
                            </div>
                        </td>
                        <td>
                            <div>Giày Ananas MONOGUSO - LOW TOP - MOONBEAM/GREEN</div>
                            <div class="size_color">
                                <a href="#">41</a> / <a href="#">Xanh</a>
                            </div>
                        </td>
                        <td>
                            <div class="price">
                                <a href="#">900,000</a><sup>đ</sup>
                            </div>
                        </td>
                    </tr>
                    
                </table>
                <div class="under">
                    <div class="under_product_list d-flex">
                        <input type="text" name="voucher" id="voucher" placeholder="Mã giảm giá">
                        <button type="button" class="using_button">Sử dụng</button>
                    </div>
                    <table>
                        <thead>
                            <tr>
                                <th class="total_line_name">
                                    <span style="visibility: hidden;">Mô tả</span>
                                </th>
                                <th class="total_line_class">
                                    <span style="visibility: hidden;">Gía</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="total_line_name">Tạm tính</td>
                                <td class="total_line_price">
                                    <span class="money">900,000</span>
                                </td>
                            </tr>
                            <tr>
                                <td class="total_line_name">Phí ship</td>
                                <td class="total_line_price">
                                    <span class="">-</span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="total_line_name">
                                    <span class="total_money">Tổng tiền</span>
                                </td>
                                <td class="total_line_price">
                                    <span class="total_payment">900,000</span>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="note">
                        Sau khi đặt hàng thành công, trong vòng 24h nhân viên CSKH sẽ liên hệ quý khách
                         để xác thực thông tin đơn hàng. Lưu ý: Cuộc gọi xác thực thông tin đơn hàng chỉ
                          áp dụng cho lần mua sắm đầu tiên của quý khách. Quý khách có nhu cầu Xuất Hóa 
                          Đơn vui lòng quay lại GIỎ HÀNG và điền thông tin vào phần ghi chú. Mọi chi tiết 
                          vui lòng xin liên hệ 1900 63 6641 để được hỗ trợ thêm.
                    </div>
                </div>
                
            </div>
        </div>
    </main>
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
<script src="../js/payment.js"></script>
</html>