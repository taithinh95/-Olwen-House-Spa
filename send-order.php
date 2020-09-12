<?php
session_start();
include 'admin/examples/db.php';
$userId = $_SESSION['current_user']['id'];
$name = $_SESSION['current_user']['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
mysqli_query($con, "insert into orders(status,userId,name,phone,address) values('Processing','$userId','$name','$address','$phone')");
$result = mysqli_query($con, "select * from orders where userId='$userId' order by id desc limit 1");
$row = mysqli_fetch_assoc($result);
$idOrders = $row['id'];
$total=0;
foreach ($_SESSION['cart'] as $key => $value) {
    $idProduct = $value['id'];
    $nameProduct = $value['name'];
    $quantity = $value['quantity'];
    $price=$value['price'];
    $total+=$quantity*$price;
    mysqli_query($con, "insert into ordersdetail(ordersId,productId,product_name,price,quantity) values($idOrders,'$idProduct','$nameProduct',$price,$quantity)");
    mysqli_query($con,"update orders set total_amount=$total where id=$idOrders");
    mysqli_query($con,"update product set inStock=inStock-$quantity, selled=selled+$quantity where id='$idProduct'");
}
unset($_SESSION['cart']);
?>
<script>
    alert("Your order has been sent");
    window.location.href = "index.php";
</script>