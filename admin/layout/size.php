<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Size</title>
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
                    <h2>Danh Sách Size</h2>
                </div>
                <div class="card-body table-responsive">
                    <div class="row mb-2">
                        <div class="col-2">
                            <a href="./addSize.php" type="button" class="btn btn-success">Thêm Size</a>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Size</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                $result = mysqli_query($con, "select * from size");
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $status;
                                        if ($row['status'] == 1) 
                                            $status = "Đang hoạt động";
                                        else 
                                            $status = "Không hoạt động";
                                        echo "<tr>"
                                            ."<td>".$row['id']."</td>"
                                            ."<td>".$row['size']."</td>"
                                            ."<td>".$status."</td>"
                                            ."<td>"
                                                ."<a href='./addSize.php?id=".$row['id']."' type='button' class='btn btn-primary mr-2'><i class='far fa-edit'></i></a>"
                                                ."<button type='button' class='btn btn-danger delete'><i class='fas fa-trash-alt'></i></button>"
                                            ."</td>"
                                        ."</tr>";
                                    }
                                }
                                if (isset($_POST['deleteId'])) {
                                    $deleteId = $_POST['deleteId'];
                                    mysqli_query($con, "UPDATE size SET status = 0 WHERE id = $deleteId");
                                }
                                mysqli_close($con);
                            ?>                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    $(document).on('click', '.delete', function () {
        var con =  confirm('Bạn có muốn xóa size này không!');
        var tr = $(this);
        var id = $(this).closest('tr').find('td:first-child').html();
        id = parseInt(id);
        if (con) {
            $.ajax({ 
                data: {
                    deleteId: id
                },
                url: "<?php echo $_SERVER['PHP_SELF'] ?>",
                type: 'post',
                success: function(){
                    $(tr).closest('tr').find('td:nth-child(3)').html("Không hoạt động");
                }
            });
        }
    })
</script>
</html>