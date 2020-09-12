<?php
include "db.php";
$id = $_POST['idProduct'];
$name = $_POST['name'];
$price = $_POST['price'];
$addQuantity = $_POST['add-quantity'];
$inStock = $_POST['inStock'];
$fileCount=$_POST['filecount'];
$addToStock = $inStock + $addQuantity;
$description = $_POST['productDes'];
$nameAvatar = $_POST['avatar'];
$nameFile = array();
$tmp_name = array();
$stament = mysqli_query(
    $con,
    "update product set name='$name', price=$price, inStock =$addToStock, description='$description' where id=$id"
);
if ($nameAvatar != null) {
    mysqli_query($con, "update product_images set avatar=0 where productId=$id");
    mysqli_query($con, "update product_images set avatar=1 where productId=$id and image_link='$nameAvatar'");
}
if ($stament == true && $fileCount!="") {
    $productId = $id;
    foreach ($_FILES['file']['name'] as $file) {
        $nameFile[] = $file;
    }
    foreach ($_FILES['file']['tmp_name'] as $file) {
        $tmp_name[] = $file;
    }
    for ($i = 0; $i < count($nameFile); $i++) {
        $fileName = $nameFile[$i];
        $upload_dir = "../../images/";
        $upload_file = $upload_dir . $fileName;
        if (move_uploaded_file($tmp_name[$i], $upload_file)) {
            mysqli_query($con, "insert into product_images(productId,image_link) values($productId,'$fileName')");
        } else {
            ?>
            <script>
                alert('Upload Images Failed... Please check images format');
                //window.location.href = "product.php";
            </script>
        <?php
        }
    }
}
mysqli_close($con);
?>
<script>
    alert('Update sucessfully');
    window.location.href = "product.php";
</script>