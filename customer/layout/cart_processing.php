<?php
    session_start();
    $con=mysqli_connect('localhost','root','12345678','projectphp');
    if($_GET['action']=="add"){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
        }
        if(isset($_GET['size'])){
            $size=$_GET['size'];
        }
        if(isset($_GET['color'])){
            $color=$_GET['color'];
        }
        if(isset($_GET['amount'])){
            $amount=$_GET['amount'];
        }
    }
    $sql="select * from product p join size_color sc on p.id=sc.product_id where id= $id and size_id=$size and color_id=$color";
    $result=mysqli_query($con, $sql);
    if($result){
        $row=mysqli_fetch_assoc($result);
    }
    
    $product=[
        'id'=>$row['id'],
        'name'=>$row['name'],
        'image'=>$row['image'],
        'size_id'=>$row['size_id'],
        'color_id'=>$row['color_id'],
        'price'=>$row['price'],
        'quantity'=>$amount
    ];
    
        //them
        if(isset($_SESSION['cart'][$id+$id+$size+$color])){
            $_SESSION['cart'][$id+$size+$color]['quantity']+=1;
        }
        else{
            $_SESSION['cart'][$id+$id+$size+$color]=$product;
        }
        //xoa
        if(isset($_GET['action'])=="delete"){
            $key=$_GET['key'];
            unset($_SESSION['cart'][$key]);
        }
        

        header("Location:./cart.php");
?>