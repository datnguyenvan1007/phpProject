<div class="category">
    <ul class="d-flex justify-content-around">
        <li><a href="./home.php">HOME</a></li>
        <?php
        $con = mysqli_connect('localhost', 'root', '12345678', 'projectphp');
        $sql = "select * from category where status=1";
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<li>'
                    . '<a href="./home.php?id=' . $row["id"] .'">' . $row["name"] . '</a>'
                    . '</li>';
            }
        }
        
        mysqli_close($con);
        ?>
    </ul>
</div>