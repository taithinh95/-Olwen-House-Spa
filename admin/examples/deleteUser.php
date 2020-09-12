<?php
include 'db.php';
$userId=$_POST['id'];
mysqli_query($con,"delete from users where id='$userId'");
mysqli_close($con);