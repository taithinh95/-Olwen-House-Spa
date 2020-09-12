<?php
session_start();
if (!isset($_SESSION['cart'])){

    $_SESSION['cart']=array();
    $_SESSION['count']=0;
}
include "admin/examples/db.php";
$productId = $_POST['id'];
$quantity = $_POST['quantity'];
$result = mysqli_query($con,"select * from product where id=".$productId);
$row=mysqli_fetch_assoc($result);
$result_images=mysqli_query($con,"select * from product_images where productId=".$productId." and avatar=1");
if ($result_images->num_rows==0){
    $result_images=mysqli_query($con,"select * from product_images where productId=".$productId." limit 1");
}
$row_images=mysqli_fetch_assoc($result_images);
$row['image']=$row_images['image_link'];
$row['quantity']=$quantity;
$_SESSION['cart'][$row['id']]=$row;
echo json_encode($_SESSION['cart']);

?>