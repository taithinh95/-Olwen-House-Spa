<?php
include "admin/examples/db.php";
$date=$_POST['date'];
$time=$_POST['time'];
$id=$_POST['idService'];
$phone=$_POST['phone'];
$datetime=$date."</br>".$time;
$result=mysqli_query($con, "select * from time_booked where date='$date' and time='$time'");
if ($result->num_rows>0 || $time=="empty") echo "Please choose valid time";
else{
    $result_service=mysqli_query($con,"select * from service where id=$id");
    $rowService=mysqli_fetch_assoc($result_service);
    $idName=$rowService['name'];
    mysqli_query($con,"insert into booking(serviceId,service_name,bookingTime,phone) values($id,'$idName','$datetime',$phone)");
    mysqli_query($con,"insert into time_booked(date,time) values('$date','$time')");
    echo "";
}