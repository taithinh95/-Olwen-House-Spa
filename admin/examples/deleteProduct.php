<?php
include 'db.php';
$idProduct=$_POST['id'];
mysqli_query($con,"delete from product_images where productId=$idProduct");
mysqli_query($con,"delete from product where id=$idProduct");
mysqli_close($con);