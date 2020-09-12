<?php
include 'db.php';
$serviceId=$_POST['id'];
mysqli_query($con,"delete from services_images where serviceId=$serviceId");
mysqli_query($con,"delete from service where id=$serviceId");
mysqli_close($con);