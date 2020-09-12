<?php
    session_start();
    include 'admin/examples/db.php';
    $fullname=$_POST['fullname'];
    
    $phone=$_POST['phone'];
   
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $dob=$_POST['dob'];
    $id=$_SESSION['current_user']['id'];

    mysqli_query($con,"update users set name='$fullname',phone='$phone',address='$address',dob='$dob',gender=$gender where id='$id'");
    $result=mysqli_query($con,"select * from users where id='$id'");
    $_SESSION['current_user']=mysqli_fetch_assoc($result);
   header('location: index.php');
?>