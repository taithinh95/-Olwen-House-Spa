<?php
session_start();
$id=$_POST['idItem'];
$total=0;
foreach ($_SESSION['cart'] as $key => $value) {
    if ($key==$id) {
        unset($_SESSION['cart'][$key]);
    }
}
foreach ($_SESSION['cart'] as $key =>$value){
    $total+=$value['price']*$value['quantity'];
}
echo $total;