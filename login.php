<?php
    include 'admin/examples/db.php';
    $username = $_POST['id'];
    $password = $_POST['password'];
    $sql='select * from users where id=? && password=? ';
    $stmt= $con->prepare($sql);
    $stmt->bind_param("ss",$username,$password);
    $stmt->execute();
    $result=$stmt->get_result();

    if ($result->num_rows>0){
        session_start();
        $_SESSION['current_user']=mysqli_fetch_assoc($result);

    }
    else{
        echo 'The Username or Password is incorrect';
    }
    
?>