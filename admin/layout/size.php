<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Size</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../style/admin.css">
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Size</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
                                $result = mysqli_query($con, "select * from size");
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>"
                                            ."<td>".$row['id']."</td>"
                                            ."<td>".$row['size']."</td>"
                                            ."<td>"
                                                ."<a href='./addSize.php?id=".$row['id']."' type='button' class='btn btn-primary mr-2'><i class='far fa-edit'></i></a>"
                                                ."<button type='button' class='btn btn-danger delete'><i class='fas fa-trash-alt'></i></button>"
                                            ."</td>"
                                        ."</tr>";
                                    }
                                }
                                if (isset($_POST['deleteId'])) {
                                    $deleteId = $_POST['deleteId'];
                                    mysqli_query($con, "DELETE FROM size WHERE id= $deleteId");
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
<script src="../js/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
                    $(tr).closest('tr').remove();
                }
            });
        }
    })
</script>
</html>