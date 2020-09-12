<?php
include 'Facebook/autoload.php';
include('fbconfig.php');
$helper = $fb->getRedirectLoginHelper();
if (isset($_GET['state'])) {
    $helper->getPersistentDataHandler()->set('state', $_GET['state']);
}
try {
    $accessToken = $helper->getAccessToken();
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    // When Graph returns an error
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    // When validation fails or other local issues
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

if (!isset($accessToken)) {
    if ($helper->getError()) {
        header('HTTP/1.0 401 Unauthorized');
        echo "Error: " . $helper->getError() . "\n";
        echo "Error Code: " . $helper->getErrorCode() . "\n";
        echo "Error Reason: " . $helper->getErrorReason() . "\n";
        echo "Error Description: " . $helper->getErrorDescription() . "\n";
    } else {
        header('HTTP/1.0 400 Bad Request');
        echo 'Bad request';
    }
    exit;
}

//Lấy thông tin của người dùng trên Facebook
try {
    // Returns a `Facebook\FacebookResponse` object
    $response = $fb->get('/me?fields=id,name,email,hometown,birthday', $accessToken->getValue());
} catch (Facebook\Exceptions\FacebookResponseException $e) {
    echo 'Graph returned an error: ' . $e->getMessage();
    exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo 'Facebook SDK returned an error: ' . $e->getMessage();
    exit;
}

$fbUser = $response->getGraphUser();

if (!empty($fbUser)) {
    include '../admin/examples/db.php';
    $result = mysqli_query($con, "select id,email,name from users where email='" . $fbUser['email'] . "'");
    if ($result->num_rows == 0) {
        $result = mysqli_query($con, "insert into users(id,email,name,address,dob) values('" . $fbUser['id'] . "','" . $fbUser['email'] . "','" . $fbUser['name'] . "','". $fbUser['hometown'] ."','".$fbUser['birthday'] . "')");
        if (!$result) {
            echo mysqli_error($con);
            exit();
        }
        $result = mysqli_query($con,"select * from  users where email='" . $fbUser['email']."'");
    }
    $result = mysqli_query($con,"select * from  users where email='" . $fbUser['email']."'");
    if ( $result->num_rows > 0) {
        $user = mysqli_fetch_assoc($result);
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }    
        $_SESSION['current_user'] = $user;
        header('location: ../index.php');

    }
}
