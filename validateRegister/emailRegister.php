<?php
    include "../admin/examples/db.php";
    $email=$_POST['email'];
    $result=mysqli_query($con,"select * from users where email='$email'");
    if ($result->num_rows>0){
        echo 'Email already exists';
        exit();
    }
    
?>