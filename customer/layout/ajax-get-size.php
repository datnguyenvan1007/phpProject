<?php 
    if (isset($_GET["size"])) {
        $size = $_GET["size"];
        $con=mysqli_connect('localhost','root','12345678','projectphp');
                        
        $sql="SELECT * FROM `size_color` sc join color c on sc.color_id=c.id WHERE sc.size_id=$size AND product_id=".$_GET["productId"];
        $result=mysqli_query($con,$sql);

        $content = "";  
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $content  .= '<option value="'.$row["color_id"].'">'.$row["color"].'</option>';
            }
        }
        echo $content;
        mysqli_close($con);
    }

?>