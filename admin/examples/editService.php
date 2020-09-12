<?php
include "db.php";
$id = $_POST['idService'];
$name = $_POST['name'];
$price = $_POST['price'];
if ($_POST['typeService'] == 'Service Type') {
    $type = 5;
} else {
    $type = $_POST['typeService'];
}
$fileCount=$_POST['filecount'];

$description = $_POST['serviceDes'];
$nameAvatar = $_POST['avatar'];
$type=$_POST['typeService'];
$hours = $_POST['hours'];
$minutes = $_POST['minutes'];
if ($hours == null) $hours = 0;
if ($minutes == null) $minutes = 0;
$time = $hours + ($minutes / 60);
$nameFile = array();
$tmp_name = array();
$stament = mysqli_query(
    $con,
    "update service set name='$name', price=$price, time=$time, description='$description', catalogServiceId=$type where id=$id"
);
if ($nameAvatar != null) {
    mysqli_query($con, "update services_images set avatar=0 where serviceId=$id");
    mysqli_query($con, "update services_images set avatar=1 where serviceId=$id and image_link='$nameAvatar'");
}
if ($stament == true && $fileCount!="") {
    $serviceId = $id;
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
            mysqli_query($con, "insert into services_images(serviceId,image_link) values($serviceId,'$fileName')");
        } else {
            ?>
            <script>
                alert('Upload Images Failed... Please check images format');
                window.location.href = "service.php";
            </script>
        <?php
        }
    }
}
mysqli_close($con);
?>
<script>
    alert('Update sucessfully');
    window.location.href = "service.php";
</script>