<?php
    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");   
    if (isset($_POST['lockId'])) {
        $lockId = $_POST['lockId'];
        mysqli_query($con, "update user set status = 0 where id = $lockId");
    }
    if (isset($_POST['unlockId'])) {
        $unlockId = $_POST['unlockId'];
        mysqli_query($con, "update user set status = 1 where id = $unlockId");
    }
    mysqli_close($con);
?>