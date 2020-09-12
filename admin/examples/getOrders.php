<?php
include "db.php";
$id=$_POST['id'];
$result=mysqli_query($con,"select * from orders where userId='$id'");

$arrayOrders = array();
while ($row=mysqli_fetch_assoc($result)) {
    $ordersId=$row['id'];
    
    $result_item = mysqli_query($con,"select * from ordersdetail where ordersId=$ordersId");
    
    $arrayItem=array();
    array_push($arrayItem,$row['total_amount'],$row['created'],$row['status']);
    while ($row_item=mysqli_fetch_assoc($result_item)){
        array_push($arrayItem,$row_item);
    }
    array_push($arrayOrders,$arrayItem);
}
echo json_encode($arrayOrders);