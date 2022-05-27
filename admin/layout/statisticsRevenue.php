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
                    <h2>Thống Kê Doanh Thu</h2>
                </div>
                <div class="card-body">
					<div class="row mb-2">
						<div class="col-2">
							<label for="year">Năm:</label>
							<select name="year" id="year" class="form-control">
								<option value="2022">2022</option>
							</select>
						</div>
					</div>
                    <div class="row">
						<div class="col-6">
							<div class="card table-responsive">
								<div class="card-header">
									<h5 class="card-title">Bảng số liệu chi tiết</h5>
								</div>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Tháng</th>
											<th>Doanh Thu</th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
											$con = mysqli_connect("localhost", "root", "12345678", "projectphp");
											for ($i = 1; $i <= 12; $i++) {
												$result = mysqli_query($con, "SELECT SUM(quantity * price) 'sum' FROM product_saleorder ps, product p, saleorder s WHERE ps.product_id = p.id AND ps.saleorder_id = s.id AND MONTH(s.created_date) = $i");
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>"
														."<td>$i</td>"
														."<td>".$row['sum']."</td>"
														."<td>"
															.'<button type="button" class="btn btn-primary detail" data-toggle="modal" data-target="#exampleModalCenter">Chi tiết</button>'
														."</td>"
													."</tr>";
												}
											}
											$result = mysqli_query($con, "SELECT SUM(quantity * price) 'sum' FROM product_saleorder ps, product p, saleorder s WHERE ps.product_id = p.id AND ps.saleorder_id = s.id");
												while ($row = mysqli_fetch_assoc($result)) {
													echo "<tr>"
														."<th>Tổng:</th>"
														."<th>".$row['sum']."</th>"
														."<th>"
														."</th>"
													."</tr>";
												} 
											mysqli_close($con);
										?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document" style="min-width: 1000px">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Chi tiết</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
									</div>
								</div>
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
	$(document).on('click', '.detail', function () {
		var month = $(this).closest('tr').find('td:first-child').html();
		var year = $('#year').val();
		year = parseInt(year);
		month = parseInt(month);
		$.ajax({
			data: {
				month: month,
				year: year
			},
			url: "../ajax/ajax_statisticsRevenue.php",
			type: "post",
			success: function (html) {
				$('.modal-body').html(html);
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