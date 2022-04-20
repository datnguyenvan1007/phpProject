<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sản Phẩm</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/admin.css">
</head>
<body>
    <div class="notification">
        
    </div>
    <?php
        include 'header.php';
    ?>
    <main>
        <?php
            include 'sidebar.php';
        ?>
        <div class="main">
            <div class="card">
                <div class="card-header">
                    <h2>Thêm Mới Sản Phẩm</h2>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="productName">Tên Sản Phẩm:</label>
                                <input type="text" name="productName" id="productName" class="form-control" required>
                            </div>
                            <div class="col-5 form-group">
                                <label for="productImage">Hình Ảnh:</label>
                                <input type="file" name="productImage" id="productImage" class="form-control-file" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="category">Danh Mục:</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="0">--Chọn--</option>
                                    <option value="1">Áo nam</option>
                                    <option value="2">Quần nam</option>
                                    <option value="3">Phụ kiện</option>
                                </select>
                            </div>
                            <div class="col-5 form-group">
                                <label for="productPicture">Hình Ảnh Liên Quan:</label>
                                <input type="file" name="productPicture" id="productPicture" class="form-control-file" multiple>
                            </div>
                        </div>
                        <div class="container-category">
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="price">Giá Tiền:</label>
                                <div class="input-group">
                                    <input type="text" name="price" id="price" class="form-control" required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">đ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-3">
                                <label for="quantity">Số Lượng:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 form-group">
                                <label for="size">Size:</label>
                                <select name="size" id="size" class="form-control" required multiple>
                                    <option value="0">--Chọn--</option>
                                    <option value="1">L</option>
                                    <option value="2">M</option>
                                </select>
                            </div>
                            <div class="col-2 form-group">
                                <label for="color">Color:</label>
                                <select name="color" id="color" class="form-control" required multiple>
                                    <option value="0">--Chọn--</option>
                                    <option value="1">Đen</option>
                                    <option value="2">Đỏ</option>
                                </select>
                            </div>
                            <div class="col-2 form-group">
                                <label for="status">Trạng Thái:</label>
                                <select name="status" id="status" class="form-control" disabled>
                                    <option value="1">Mới</option>
                                    <option value="2">Bán chạy</option>
                                    <option value="3">Bình thường</option>
                                    <option value="4">Hết hàng</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-10">
                                <label for="description">Mô Tả:</label>
                                <textarea name="description" id="description" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <button type="button" class="btn btn-success">Thêm mới</button>
                        <button class="btn btn-primary save">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../js/admin.js"></script>
</html>