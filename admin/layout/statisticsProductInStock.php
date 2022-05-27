<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Sản Phẩm</title>
    <?php include "lib.php"; ?>
</head>
<body>
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
                    <h2>Thông Kê Mặt Hàng Đã Bán</h2>
                </div>
                <div class="card-body">
					<div class="row mb-2">
						<div class="col-3">
							<label for="statistics">Thống kê theo:</label>
							<select name="statistics" id="statistics" class="form-control">
								<option value="1">Danh mục</option>
								<option value="2">Sản phẩm</option>
								<option value="3">Màu sắc</option>
								<option value="4">Size</option>
							</select>
						</div>
					</div>
                    <div class="row">
						<div class="col-8">
							<div class="card table-responsive">
								<div class="card-header">
									<h5 class="card-title">Bảng số liệu chi tiết</h5>
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Danh mục</th>
											<th>Tồn kho</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$con = mysqli_connect("localhost", "root", "12345678", "projectphp");
											$result = mysqli_query($con, "SELECT c.name, SUM(sc.quantity) 'sum' from category c JOIN product p on c.id = p.category_id JOIN size_color sc ON sc.product_id = p.id GROUP BY c.name");
											if (mysqli_num_rows($result) > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>"
														."<td>".$row['name']."</td>"
														."<td>".$row['sum']."</td>"
													."</tr>";
												}
											}
											$result = mysqli_query($con, "SELECT c.name, SUM(sc.quantity) 'sum' from category c JOIN product p on c.id = p.category_id JOIN size_color sc ON sc.product_id = p.id");
											if (mysqli_num_rows($result) > 0) {
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>"
														."<th>Tổng</th>"
														."<th>".$row['sum']."</th>"
													."</tr>";
												}
											}
											mysqli_close($con);
										?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- <div class="col-4">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title">Biểu đồ thống kê sản phẩm</h5>
								</div>
								<div class="card-body">
									<div class="chart chart-sm">
										<canvas id="chartjs-pie"></canvas>
									</div>
								</div>
							</div>
						</div> -->
                    </div>  
                </div>
            </div>
        </div>
    </main>
</body>
<script>
	$('#statistics').on('change', function () {
		var option = $('#statistics').val();
		option = parseInt(option);
		$.ajax({
			data: {
				option: option
			},
			type: 'post',
			url: '../ajax/ajax_statisticsProductInStock.php',
			success: function (html) {
				$('table').html(html);
			}
		})
	})
</script>
<!-- <script src="../js/app.js"></script>
<script>
	document.addEventListener("DOMContentLoaded", function() {
		// Pie chart
		new Chart(document.getElementById("chartjs-pie"), {
			type: "pie",
			data: {
				labels: ["Đã bán", "Tồn kho"],
				datasets: [{
					data: [260, 125],
					backgroundColor: [
						window.theme.primary,
						window.theme.warning,
						window.theme.danger,
						"#dee2e6"
					],
					borderColor: "transparent"
				}]
			},
			options: {
				maintainAspectRatio: false,
			}
		});
	});
</script> -->
</html>