<?php
    include "../admin/examples/db.php";
    $id=$_POST['password'];
    if (strlen($password)<6){
        echo 'Username must be more than 6 characters';
    }
    
?>