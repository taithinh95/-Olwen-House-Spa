<?php
include "db.php";
$username = $_POST['username'];
$password = $_POST['password'];
$sql = 'select * from admin where id=? && password=? ';
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    session_start();
    $_SESSION['current_admin'] = mysqli_fetch_assoc($result);
    header("location: user.php");
} else {
    ?>
    <script>
        alert("Username or Password is incorect");
        window.location.href="loginadmin.php";
    </script>
<?php
}
