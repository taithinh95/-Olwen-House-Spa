<?php
session_start();
include "admin/examples/db.php";
$idUser=$_SESSION['current_user']['id'];
$index=$_POST['index'];
$idProduct=$_POST['idProduct'];
$result = mysqli_query($con, "select * from rating_product where idUser = '$idUser' and idProduct=$idProduct ");
if ($result->num_rows > 0) {
    mysqli_query($con, "update rating_product set rating=$index where idUser='$idUser' and idProduct=$idProduct ");
}
else{
    mysqli_query($con,"insert into rating_product(idUser,idProduct,rating) values('$idUser',$idProduct,$index)");
}
echo "Thank you for rating";
