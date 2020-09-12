<?php

include "admin/examples/db.php";
$id=intval(substr($_POST['id'],7));
$result=mysqli_query($con,"select * from service where id=$id");
$row=mysqli_fetch_assoc($result);
$image_list = mysqli_query($con," select * from services_images where serviceId=$id");
while ($row_images=mysqli_fetch_assoc($image_list)){
    $row['image_list']=$row_images;
}
echo json_encode($row);
?>