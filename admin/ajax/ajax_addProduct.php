<?php
    $con = mysqli_connect("localhost", "root", "12345678", "projectphp");
    $sql = "select * from color where status = 1";
    $result = mysqli_query($con, $sql);
    echo '<option value="0">--Chọn--</option>';
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $colorId = $_GET['colorId'];
            if (isset($colorId) && $colorId == $row['id']) {
                echo "<option value=". $row['id']. " selected>". $row['color']. "</option>";
            }
            else
                echo "<option value=". $row['id']. ">". $row['color']. "</option>";
        }
    }
    mysqli_close($con);
?>