<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Danh Mục</title>
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
                    <h2>Danh Mục Sản Phẩm</h2>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Danh Mục</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $con = mysqli_connect('localhost', 'root', 'milkyway', 'projectphp');
                                $sql = "select * from category";
                                $result = mysqli_query($con, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr?>";
                                        echo "<td>".$row['id']."</td>";
                                        echo "<td>".$row['name']."</td>";
                                        echo '<td>'
                                            .'<a type="button" href="./addCategory.php?id='.$row['id'].'" class="btn btn-primary mr-2"><i class="far fa-edit text-white"></i></a>'
                                            .'<a href="#" type="button" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>'
                                        .'</td></tr>';
                                    }
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
</html>