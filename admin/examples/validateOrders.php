<?php
include "db.php";
$id=$_POST['id'];
$acc=$_POST['action'];
if ($acc=='accept'){
    mysqli_query($con,"update orders set status='Successful' where id='$id'");
    echo 'Successful';
}
else{
    
    $result=mysqli_query($con,"select * from ordersdetail where ordersId=$id");
    while ($row=mysqli_fetch_assoc($result)){
        $quantity = $row['quantity'];
        $idProduct= $row['productId'];
        mysqli_query($con,"update product set inStock=inStock+$quantity, selled=selled-$quantity where id=$idProduct");
        mysqli_query($con,"update orders set status='Cancel' where id='$id'");
    }
    echo "Cancel";
}