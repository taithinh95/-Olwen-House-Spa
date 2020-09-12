
<?php
include "db.php";
$name = $_POST["productName"];
$price = $_POST["productPrice"];
$quantity = $_POST["productQuantity"];
$description = $_POST["productDes"];
$fileCount=$_POST['filecount'];
$nameFile = array();
$tmp_name = array();
$stament = mysqli_query(
    $con,
    "insert into product(name,price,description,inStock) values('$name',$price,'$description',$quantity)"
);
if ($stament == true && $fileCount!="") {
    $result = mysqli_query($con, "select * from product order by id desc limit 1");
    $row = mysqli_fetch_assoc($result);
    $productId = $row['id'];
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
            mysqli_query($con, "insert into product_images(productId,image_link) values('$productId','$fileName')");
        } else {
            ?>
            <script>
                alert('Upload Images Failed... Please check images format');
                window.location.href = "createProduct.php";
            </script>
        <?php
        }
    }
} 
?>
<script>
    alert('Update sucessfully');
    window.location.href = "createProduct.php";
</script>