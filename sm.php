<?php
if(isset($_POST['submit-contact'])){ 
    $to = "benalpha1105@gmail.com";  
    $subject=$_POST['w3lSubject'];
    $email = $_POST['w3lSender'];
    $message = $_POST['w3lMessage'];
    $headers = "From: $email";  
    $sent = mail($to, $subject, $message, $headers) ;     
    if($sent)  {
        echo "Gửi mail thành công"; 
    } else  {
        echo "Có lỗi khi gửi mail"; 
    } 
}
?>