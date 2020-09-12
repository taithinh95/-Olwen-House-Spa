<?php
include "admin/examples/db.php";
$date=$_POST['date'];
$result=mysqli_query($con, "select * from time_booked where date='$date'");

$arrayTime = array();
if ($result->num_rows>0){
    while ($row=mysqli_fetch_assoc($result)){
        array_push($arrayTime,$row['time']);
    }
    echo json_encode($arrayTime);
}