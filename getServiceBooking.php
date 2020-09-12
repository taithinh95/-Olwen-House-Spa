<?php
    include 'admin/examples/db.php';    
    $type = $_POST['typeBooking'];
    if ($type!=0){
        $result= mysqli_query($con,"select * from service where catalogServiceId=$type");
    }
    else{
        $result= mysqli_query($con,"select * from service");
    }
    $arr=array();
    while ($row=mysqli_fetch_assoc($result)){
        $arr[]=$row;
    }
    echo json_encode($arr);
?>
