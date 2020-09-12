<?php
    include "../admin/examples/db.php";
    $id=$_POST['id'];
    if (strlen($id)<6){
        echo 'Username must be more than 6 characters';
    }
    $result=mysqli_query($con,"select * from users where id='$id'");
    if ($result->num_rows>0){
        echo 'Username already exists';
        exit();
    }
?>