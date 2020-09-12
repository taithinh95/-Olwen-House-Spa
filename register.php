<?php
include "admin/examples/db.php";
    $id=$_POST['id'];
    $pass=$_POST['password'];
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dob=$_POST['dob'];
    $gender=$_POST['gender'];
    $address=$_POST['address'];
    mysqli_query($con,"insert into users(id,password,name,email,phone,dob,gender,address) 
    values('$id','$pass','$fullname','$email','$phone','$dob',$gender,'$address')");

    if (session_status()==PHP_SESSION_NONE){
        session_start();
    }
    $user=array(
        'id'=>$id,
        'name'=>$fullname,
        'password'=>$pass,
        'email'=>$email,
        'phone'=>$phone,
        'dob'=>$dob,
        'gender'=>$gender==0?"Male":"Female",
        'address'=>$address
    );
    $_SESSION['current_user']=$user;
    header('location: index.php');
?>