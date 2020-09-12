<?php
include "db.php";
$name = $_POST["serviceName"];
$price = $_POST["servicePrice"];
if ($_POST['typeService'] == 'Service Type') {
    $type = 5;
} else {
    $type = $_POST['typeService'];
}
$description = $_POST["serviceDes"];
$fileCount=$_POST['filecount'];
$hours = $_POST['hours'];
$minutes = $_POST['minutes'];
if ($hours == null) $hours = 0;
if ($minutes == null) $minutes = 0;
$time = $hours + ($minutes / 60);
$nameFile = array();
$tmp_name = array();
$stament = mysqli_query(
    $con,
    "insert into service(name,price,description,time,catalogServiceId) values('$name',$price,'$description',$time,$type)"
);
if ($stament == true && $fileCount!="") {
    $result = mysqli_query($con, "select * from service order by id desc limit 1");
    $row = mysqli_fetch_assoc($result);
    $serviceId = $row['id'];
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
            mysqli_query($con, "insert into services_images(serviceId,image_link) values('$serviceId','$fileName')");
        } else {
            ?>
            <script>
                alert('Upload Images Failed... Please check images format');
                window.location.href = "createService.php";
            </script>
        <?php
        }
    }
} 
?>
<script>
    alert('Update sucessfully');
    window.location.href = "createService.php";
</script>