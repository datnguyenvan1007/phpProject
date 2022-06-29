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
            <div class="row mb-5">
                <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <div class="card-body bg-success pb-0 px-4 py-4">
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-1 text-white">
                                        <?php
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $result = mysqli_query($con, "select sum(quantity) 'sum' from product_saleorder");
                                            $row = mysqli_fetch_assoc($result);
                                            echo $row['sum'];
                                            mysqli_close($con);
                                        ?>
                                    </h5>
                                    <span class="text-white">Sản Phẩm Đã Bán</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-xxl-3 col-lg-6 col-sm-6">
                    <div class="card overflow-hidden">
                        <div class="card-body pb-0 px-4 py-4">
                            <div class="row">
                                <div class="col">
                                    <h5 class="mb-1">
                                        <?php
                                            $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                            $result = mysqli_query($con, "select sum(quantity) 'sum' from size_color");
                                            $row = mysqli_fetch_assoc($result);
                                            echo $row['sum'];
                                            mysqli_close($con);
                                        ?>
                                    </h5>
                                    <span class="">Sản Phẩm Tồn Kho</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Thống Kê Doanh Thu</h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="user" role="tabpanel">
                                    <canvas id="activity" class="chartjs"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </main>
</body>
<script src="../js/Chart.bundle.min.js"></script>
<script>
    var d = new Array();
    $(document).ready(function () {
        $.ajax({
            url: "../ajax/ajax_statistics.php",
            success: function (html) {
                d = JSON.parse(html);
                var activity = document.getElementById("activity");
                if (activity !== null) {
                    activity.height = 300;
                    var config = {
                        type: "bar",
                        data: {
                            labels: [
                                "01",
                                "02",
                                "03",
                                "04",
                                "05",
                                "06",
                                "07",
                                "08",
                                "09",
                                "10",
                                "11",
                                "12"
                            ],
                            datasets: [
                                {
                                    label: "Doanh thu",
                                    data:  d,
                                    borderColor: 'rgba(26, 51, 213, 1)',
                                    borderWidth: "0",
                                    backgroundColor: 'rgba(58, 122, 254, 1)'
                                    
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            
                            legend: {
                                display: false
                            },
                            scales: {
                                yAxes: [{
                                    gridLines: {
                                        color: "rgba(89, 59, 219,0.1)",
                                        drawBorder: true
                                    },
                                    ticks: {
                                        fontColor: "#999",
                                    },
                                }],
                                xAxes: [{
                                    gridLines: {
                                        display: false,
                                        zeroLineColor: "transparent"
                                    },
                                    ticks: {
                                        stepSize: 5,
                                        fontColor: "#999",
                                        fontFamily: "Nunito, sans-serif"
                                    }
                                }]
                            },
                            tooltips: {
                                mode: "index",
                                intersect: false,
                                titleFontColor: "#888",
                                bodyFontColor: "#555",
                                titleFontSize: 12,
                                bodyFontSize: 15,
                                backgroundColor: "rgba(256,256,256,0.95)",
                                displayColors: true,
                                xPadding: 10,
                                yPadding: 7,
                                borderColor: "rgba(220, 220, 220, 0.9)",
                                borderWidth: 2,
                                caretSize: 6,
                                caretPadding: 10
                            }
                        }
                    };

                    var ctx = document.getElementById("activity").getContext("2d");
                    var myLine = new Chart(ctx, config);
                }
            }
        })
    })
</script>
</html>