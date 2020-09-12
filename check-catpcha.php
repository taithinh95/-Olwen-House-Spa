<?php
if (isset($_POST['submit'])) {
    $captcha;
    echo $_POST['buttondata'];
    if (isset($_POST['buttondata'])) {
        $captcha = $_POST['buttondata'];
    }
    if (!$captcha) {
        echo 'Please check the button above!';
    } else {
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6Lfd764UAAAAAHe9MC8dqsGfNGEdoNProY15Fwgs-*****&response=" . $captcha . "&remoteip=" . $_SERVER['REMOTE_ADDR']);
        if ($response == null && !$response->success) {
            echo '<h2>SPAM!</h2>';
        } else {
            echo 'You have booked successfully!';
        }
    }
}
