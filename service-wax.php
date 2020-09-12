<?php
include 'admin/examples/db.php';
session_start();
require_once "recaptchalib.php";
include 'FacebookLogin/facebook_source.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Service</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Owen House" />
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="./images/logo.jpg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link rel="stylesheet" href="css/service.css" type="text/css" media="all">
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <!-- //font-awesome-icons -->

</head>

<body>
    <!--/home -->
    <div id="home" class="inner-w3pvt-page">
        <div class="overlay-innerpage">
            <!--/top-nav -->
            <div class="top_w3pvt_main container">
                <!--/header -->
                <header class="nav_w3pvt text-center">
                    <!-- nav -->
                    <nav class="wthree-w3ls">
                        <div id="logo">
                            <h1> <a class="navbar-brand px-0 mx-0" href="index.php">Owen House
                                </a>
                            </h1>
                        </div>
                        <label for="drop" class="toggle">Menu</label>
                        <input type="checkbox" id="drop" />
                        <ul class="menu mr-auto">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li class="active"><a href="services.php?page=1">Services</a></li>
                            <li><a href="product.php?page=1">Product</a></li>
                            <li><a href="contact.php">Contact</a></li>
                            <li>

                                <a id="name-after-login" href="#" id="sign-in-drop" data-toggle="modal" data-target=".login-form">Log in <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                                <input type="checkbox" id="drop-2" />
                                <ul id="drop-sign-in">
                                    <li id="signin-button"><a href="" data-toggle="modal" data-target=".login-form" class="drop-text"><i class="fa fa-user"></i> | Sign in</a></li>
                                    <li id="register-button"><a data-toggle="modal" data-target=".register" href="" class="drop-text"><i class="fa fa-address-card"></i> | Register</a></li>
                                    <li id="profile-button"><a href="" data-toggle="modal" data-target=".profile" class="drop-text"><i class="fa fa-id-card"></i> Profile</a></li>
                                    <li id="orders-button"><a href="" data-toggle="modal" data-target=".orders" class="drop-text"><i class="fa fa-money"></i> Orders</a></li>

                                    <li id="logout-button"><a href="logout.php" class="drop-text"> <i class="fa fa-sign-out"></i> Log out</a></li>
                                </ul>
                            </li>
                            <li class="social-icons ml-lg-3"><a href="https://www.facebook.com/olwenhousespa/" class="p-0 social-icon"><span class="fa fa-facebook-official" aria-hidden="true"></span>
                                    <div class="tooltip">Our Facebook</div>
                                </a>
                            </li>
                            <li class="social-icons ml-lg-3" data-toggle="modal" id="cart-button"><a disabled="disabled" href="#" class="p-0 social-icon"><span class="fa fa-shopping-cart" aria-hidden="true"></span>
                                    <div class="tooltip">Cart</div>
                                    <span id="quantity-product"><?php if (isset($_SESSION['cart'])) echo count($_SESSION['cart']) ?></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- //nav -->
                </header>
                <!--//header -->

                <!--/breadcrumb-->
                <div class="inner-w3pvt-page-info">
                    <ol class="breadcrumb d-flex">
                        <li class="breadcrumb-item">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Service</li>
                    </ol>

                </div>
                <!--//breadcrumb-->
            </div>
            <!-- //top-nav -->
        </div>
    </div>
    <div class="modal fade register" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="registerForm" action="register.php" method="POST">
                    <legend class="title-form">MEMBER REGISTER</legend>
                    <div class="form-group register-form-group">
                        <label>User Name(*)</label>
                        <input type="text" class="form-control" id="username" name="id" required="required">
                        <span class="warning warning-username"></span>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Password(*)</label>
                        <input type="password" id="password-register" name="password" class="form-control" required="required">
                        <span class="warning warning-pass">Password must be 6-18 letters and mustn't contain
                            special characters</span>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Re-enter password(*)</label>
                        <input type="password" id="re-password-register" class="form-control" required="required">
                        <span class="warning warning-repass">Re-password must be the same as password</span>
                    </div>

                    <div class="form-group register-form-group">
                        <label>Full Name</label>
                        <br>
                        <input id="fullname" type="text" name="fullname" class="form-control">
                        <div id="gender-group">
                            Male <input type="radio" value="0" name="gender" checked> |
                            Female <input type="radio" value="1" name="gender">
                        </div>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Phone</label>
                        <input type="text" pattern="^0[0-9]{9}$" name="phone" class="form-control" required="required">

                    </div>
                    <div class="form-group register-form-group">
                        <label>Email</label>
                        <input id="email" type="email" name="email" class="form-control">
                        <span class="warning warning-email">Email format is not valid</span>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required="required">

                    </div>

                    <div class="form-group register-form-group">
                        <label>Date of Birth</label>
                        <input class="form-control" name="dob" type="date" placeholder="Birthdate" name="birthday">
                    </div>
                    <div class="form-group register-form-group">
                        <div class="button-group">
                            <button name="submit" type="submit" class="btn btn-primary">Register</button>
                            <button id="register-button-directive" type="button" class="btn btn-danger">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade orders" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form>
                    <legend class="title-form">SHOPPING HISTORY</legend>
                    <?php
                    if (isset($_SESSION['current_user'])) {
                        $idUser = $_SESSION['current_user']['id'];
                        $result = mysqli_query($con, "select * from orders where userId='$idUser'");

                        while ($row = mysqli_fetch_assoc($result)) {
                            $i = 0;
                            ?>
                            <div class="form-group register-form-group">
                                <label>Date</label>
                                <input disabled="disabled" class="form-control" value="<?= $row['created'] ?>" type="text">
                            </div>
                            <?php $result_item = mysqli_query($con, "select * from ordersdetail where ordersId=" . $row['id']);
                            while ($row_item = mysqli_fetch_assoc($result_item)) {
                                ?>
                                <div class="form-group register-form-group">
                                    <?= "Item " . ++$i ?>
                                    <input disabled="disabled" class="form-control" value="Name: <?= $row_item['product_name'] ?>" type="text">
                                    <input disabled="disabled" class="form-control" value="Price: <?= $row_item['price'] ?>" type="text">
                                    <input disabled="disabled" class="form-control" value="Quantity: <?= $row_item['quantity'] ?>" type="text">

                                </div>

                            <?php }

                            ?><div class="form-group register-form-group">
                                <input disabled="disabled" class="form-control" value="Total: <?= $row['total_amount'] ?>" type="text">
                            </div>
                            <div style="height:5px;width:100%;background-color:crimson">

                            </div>
                        <?php } ?>
                    <?php
                    } ?>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade login-form" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="loginForm" action="login.php" method="POST">
                    <legend class="title-form">LOGIN</legend>
                    <div class="form-group register-form-group">
                        <label>User Name</label>
                        <input type="text" class="form-control" id="id-login" required="required">
                    </div>
                    <div class="form-group register-form-group">
                        <label>Password</label>
                        <input type="password" id="password-login" class="form-control" required="required">
                        <span class="warning warning-login"></span>
                    </div>

                    <div class="form-group register-form-group">
                        <div class="button-group">
                            <button id="submit-login" name="submit" type="button" class="btn btn-primary">Login</button>
                            <button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
                            <a id="login-facebook" href="<?= $loginUrl ?>"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade profile" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <form id="profileForm" action="edit.php" method="POST">
                    <legend class="title-form">Profile</legend>
                    <div class="form-group register-form-group">
                        <label>Full Name</label>
                        <br>
                        <input type="text" value="<?= $_SESSION['current_user']['name'] ?>" name="fullname" class="form-control">
                        <div id="gender-group">
                            Male <input id="gender-male" type="radio" value="0" name="gender" checked> |
                            Female <input id="gender-female" type="radio" value="1" name="gender">
                        </div>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Phone</label>
                        <input type="text" pattern="^0[0-9]{9}$" name="phone" value="<?= $_SESSION['current_user']['phone'] ?>" class="form-control">

                    </div>
                    <div class="form-group register-form-group">
                        <label>Email</label>
                        <input class="form-control" value="<?= $_SESSION['current_user']['email'] ?>" disabled>
                    </div>
                    <div class="form-group register-form-group">
                        <label>Address</label>
                        <input type="text" name="address" value="<?= $_SESSION['current_user']['address'] ?>" class="form-control">
                    </div>
                    <div class="form-group register-form-group">
                        <label>Date of Birth</label>
                        <input class="form-control" value="<?= $_SESSION['current_user']['dob'] ?>" name="dob" type="date" placeholder="Birthdate" name="birthday">
                    </div>
                    <div class="form-group register-form-group">
                        <div class="button-group">
                            <button id="save-button" class="btn btn-primary">Save</button>
                            <button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-xl cart-box" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <section class="container content-section">
                    <h2 style="text-align:center;border-bottom:1px solid black" class="section-header">CART</h2>
                    <table id="cartTable" style="width:100%;">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Amount</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <form action="send-order.php" method="post">
                        <div class="container">
                            <div class="row">
                                <div class="offset-md-2 col-md-8 offset-md-2">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" required type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="offset-md-2 col-md-8 offset-md-2">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" pattern="^0[0-9]{9}$" name="phone" class="form-control" required="required">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn more black btn-purchase" type="submit">PURCHASE</button>
                    </form>
                </section>
            </div>
        </div>
    </div>
    <!--/service-->
    <section class="services-section py-5 py-md-0 bg-light">
        <div class="container">
            <div class="row no-gutters d-flex">
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ">
                    <a href="service-skincare.php">
                        <div class="media block-6 services1 d-block">
                            <div class="media-body">
                                <h3 class="heading mb-3" style="color:black">Skin Care</h3>
                                <p style="color:black">203 Fake St. Mountain View, San Francisco, California, USA</p>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ">
                    <a href="services.php?page=1">
                        <div class="media block-6 services1 d-block service1-active">
                            <div class="media-body">

                                <h3 class="heading mb-3" style="color:black">Waxing</h3>
                                <p style="color:black">203 Fake St. Mountain View, San Francisco, California, USA</p>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ">
                    <a href="service-whitebath.php">
                        <div class="media block-6 services1 d-block">
                            <div class="media-body">

                                <h3 class="heading mb-3" style="color:black">White Bath</h3>
                                <p style="color:black">203 Fake St. Mountain View, San Francisco, California, USA</p>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-6 col-lg-3 d-flex align-self-stretch ">
                    <a href="service-massage.php">
                        <div class="media block-6 services1 d-block">
                            <div class="media-body">

                                <h3 class="heading mb-3" style="color:black">Massage</h3>
                                <p style="color:black">203 Fake St. Mountain View, San Francisco, California, USA</p>

                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!--/service-->
    <!-- /projects -->
    <?php

    $resultProduct = mysqli_query($con, 'select * from service where catalogServiceId=3');

    ?>
    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Our</span> Service</h3>

            <div class="row news-grids mt-md-5 mt-4 text-center">
                <?php

                while ($row = mysqli_fetch_assoc($resultProduct)) {


                    ?>
                    <div class="col-md-4 gal-img" data-toggle="modal" data-target="<?= '#product' . $row['id'] ?>">
                        <?php
                        $result_img = mysqli_query($con, "select * from services_images where serviceId=" . $row['id'] . " and avatar=1");
                        if ($result_img->num_rows == 0) {
                            $result_img = mysqli_query($con, "select * FROM services_images where serviceId=" . $row['id'] . " limit 1");
                        }
                        while ($row_images = mysqli_fetch_assoc($result_img)) {
                            ?>
                            <img src="images/<?= $row_images['image_link'] ?>" alt="<?= $row_images['image_link'] ?>">
                        <?php } ?>
                        <div class="gal-info">
                            <h5><?= $row['name'] ?><span class="decription"><?= number_format($row['price'], 0, '', '.') ?> VND</span></h5>
                        </div>
                    </div>
                    <div class="modal fade product-details" id="<?= 'product' . $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-5">

                                            <div id="carousel<?php echo $row['id'] ?>" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php $result_images_slide = mysqli_query($con, "select * from services_images where serviceId=" . $row['id'] . " and avatar=1");
                                                    if ($result_images_slide->num_rows == 0) {
                                                        $result_images_slide = mysqli_query($con, "select * from services_images where serviceId=" . $row['id'] . " limit 1");
                                                    }
                                                    while ($row_images = mysqli_fetch_assoc($result_images_slide)) { ?>
                                                        <div class="carousel-item active">

                                                            <img class="d-block w-100" src="images/<?= $row_images['image_link'] ?>" alt="<?= $row_images['image_link'] ?>">

                                                        </div>
                                                    <?php } ?>
                                                    <?php $result_images_slide = mysqli_query($con, "select * from services_images where serviceId=" . $row['id']);
                                                    while ($row_images = mysqli_fetch_assoc($result_images_slide)) { ?>
                                                        <div class="carousel-item">

                                                            <img class="d-block w-100" src="images/<?= $row_images['image_link'] ?>" alt="<?= $row_images['image_link'] ?>">

                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <a class="carousel-control-prev" href="#carousel<?php echo $row['id'] ?>" role="button" data-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#carousel<?php echo $row['id'] ?>" role="button" data-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="sr-only">Next</span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <h3 class="h1 product-single__title">
                                                <?= $row['name'] ?>
                                            </h3>
                                            <div class="product-single__price">
                                                <div class="product-price">
                                                    <span class="cart-price">
                                                        <u><?= number_format($row['price'], 0, '', '.') ?> VND </u>
                                                        (<?= (intval($row['time']) != 0) ? intval($row['time']) . "h :" : "" ?> <?= ($row['time'] - intval($row['time'])) != 0 ? ((($row['time'] - intval($row['time'])) * 60) . "m") : "00m"  ?>)
                                                    </span>
                                                </div>
                                            </div>
                                            <div style="height:initial" class="description-product"><?= $row['description'] ?>
                                            </div>
                                            <form action="sendBooking.php" method="POST" role="form">

                                                <div class="form-group">
                                                    <label>Enter your phone</label>
                                                    <input type="text" name="phone" id="phoneee<?= $row['id'] ?>" pattern="^0[0-9]{9}$" class="form-control" required="required">
                                                    <div class="announcePhone"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Choose Date</label>
                                                    <input type="date" class="form-control date" id="date<?= $row['id'] ?>" required placeholder="Input field">
                                                </div>
                                                <div class="form-group choose-time-group">
                                                    <label class="label-choosetime" for="">Choose Time</label>
                                                    <table class="choose-time">
                                                        <tr>
                                                            <td>08:00</td>
                                                            <td>09:00</td>
                                                            <td>10:00</td>
                                                            <td>11:00</td>
                                                            <td>12:00</td>
                                                            <td>13:00</td>
                                                            <td>14:00</td>
                                                            <td>15:00</td>
                                                            <td>16:00</td>
                                                        </tr>
                                                        <tr>
                                                            <td>08:15</td>
                                                            <td>09:15</td>
                                                            <td>10:15</td>
                                                            <td>11:15</td>
                                                            <td>12:15</td>
                                                            <td>13:15</td>
                                                            <td>14:15</td>
                                                            <td>15:15</td>
                                                            <td>16:15</td>
                                                        </tr>
                                                        <tr>
                                                            <td>08:30</td>
                                                            <td>09:30</td>
                                                            <td>10:30</td>
                                                            <td>11:30</td>
                                                            <td>12:30</td>
                                                            <td>13:30</td>
                                                            <td>14:30</td>
                                                            <td>15:30</td>
                                                            <td>16:30</td>
                                                        </tr>
                                                        <tr>
                                                            <td>08:45</td>
                                                            <td>09:45</td>
                                                            <td>10:45</td>
                                                            <td>11:45</td>
                                                            <td>12:45</td>
                                                            <td>13:45</td>
                                                            <td>14:45</td>
                                                            <td>15:45</td>
                                                            <td>16:45</td>
                                                        </tr>
                                                    </table>
                                                    <div class="announce"></div>
                                                </div>
                                                <div class="button-quantity">
                                                    <button id="booking<?= $row['id'] ?>" type="button" class="btn more black add-to-card button-booking">Book Now</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>



            <!-- //popup -->
            <!-- popup-->
            <!-- //popup -->

        </div>
    </section>
    <!-- //projects -->
    <!-- /news-letter -->
    <section class="news-letter-w3pvt py-5">
        <div class="container contact-form mx-auto text-left">
            <h3 class="title-w3ls two text-left mb-3">Newsletter </h3>
            <form method="post" action="#" class="w3ls-frm">
                <div class="row subscribe-sec">
                    <p class="news-para col-lg-3">Want Some Discount ?</p>
                    <div class="col-lg-6 con-gd">
                        <input type="email" class="form-control" id="email-letter" placeholder="Your Email here..." name="email" required>

                    </div>
                    <div class="col-lg-3 con-gd">
                        <button type="submit" class="btn submit">Subscribe</button>
                    </div>

                </div>

            </form>
        </div>
    </section>
    <!-- //news-letter -->

    <!-- footer -->
    <footer class="py-lg-5 py-4">
        <div class="container py-sm-3">
            <div class="row footer-grids">
                <div class="col-lg-4 mt-4">

                    <h2> <a class="navbar-brand px-0 mx-0 mb-4" href="index.php">OWEN HOUSE
                        </a>
                    </h2>
                    <p class="mb-3">Lorem Ipsum is simply text the printing and typesetting standard industry. Onec Consequat sapien ut cursus rhoncus. Nullam dui mi, vulputate ac metus.</p>

                    <div class="icon-social mt-4">
                        <a href="#" class="button-footr">
                            <span class="fa mx-2 fa-facebook"></span>
                        </a>
                        <a href="#" class="button-footr">
                            <span class="fa mx-2 fa-instagram"></span>
                        </a>
                        <a href="#" class="button-footr">
                            <span class="fa mx-2 fa-google-plus"></span>
                        </a>

                    </div>
                </div>
                <div class="col-lg-4 mt-4 ">
                    <h4 class="mb-4 ml-5">Quick Links</h4>
                    <div class="links-wthree d-flex">
                        <ul class="list-info-wthree ml-5">
                            <li>
                                <a href="index.php"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="about.php"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="single.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Single Page
                                </a>
                            </li>
                            <li>
                                <a href="team.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Team
                                </a>
                            </li>
                            <li>
                                <a href="contact.php"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
                                    Contact Us
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 ad-info">
                    <h4 class="mb-4">Contact Info</h4>
                    <p><span class="fa fa-map-marker"></span>FPT-Aptech Computer Education HCM, Cách Mạng Tháng 8, phường 11, Quận 3, Hồ Chí Minh</span></p>
                    <p class="phone"><span class="fa fa-phone"></span> 0908663101</p>
                    <p class="phone"><span class="fa fa-fax"></span> 0908663101</p>
                    <p><span class="fa fa-envelope"></span><a href="mailto:letuyettrinh10c12@gmail.comm">letuyettrinh10c12@gmail.com</a></p>
                </div>

            </div>
        </div>
    </footer>

    <div class="copy_right p-3 d-flex">
        <div class="container">
            <div class="row d-flex">
                <div class="col-lg-9 copy_w3pvt">
                    <p class="text-lg-left text-center">© 2019 Owen House. All rights reserved

                </div>
                <!-- move top -->
                <div class="col-lg-3 move-top text-lg-right text-center">
                    <a href="#home" class="move-top">
                        <span class="fa fa-angle-double-up mt-3" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- move top -->
            </div>
        </div>

    </div>
    <div class="modal fade add-success-box" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="noti" style="font-size:20px">You have booked the service successfully </div>
                <div class="button-group button-group-cart">
                    <button class="btn btn-info" data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    if (isset($_SESSION['current_user'])) {
        ?>
        <script>
            $('#logout-button, #profile-button, #orders-button').css('display', 'block');
            $('#name-after-login').html('<?= $_SESSION['current_user']['name'] != '' ? $_SESSION['current_user']['name'] : $_SESSION['current_user']['id'] ?> <span class="fa fa-angle-down" aria-hidden="true"></span>')
            $('#register-button, #signin-button').css('display', 'none');
        </script>
    <?php
    }
    if (isset($_SESSION['current_user']) && $_SESSION['current_user']['gender'] == 0) {
        ?>
        <script>
            $('#gender-male').prop('checked', true);
            $('#gender-female').prop('checked', false);
        </script>
    <?php
    } else {

        ?> <script>
            $('#gender-male').prop('checked', false);
            $('#gender-female').prop('checked', true);
        </script>
    <?php }
    ?>

    <script>
        var flag = new Array(true, true, true, true, true);
        $(document).ready(function() {
            $('#username').keyup(function() {
                $.ajax({
                    url: "validateRegister/usernameRegister.php",
                    type: 'post',
                    data: {
                        id: $('#username').val()
                    },
                    success: function(result) {
                        if (result != '') {
                            $('.warning-username').css("display", "block");
                            $('.warning-username').html(result);
                            flag[0] = false;
                        } else {
                            $('.warning-username').css("display", "none");
                            $('.warning-username').html('result');
                            flag[0] = true;
                        }
                    }
                });
            });
            $('#register-button-directive').click(function() {
                $('.login-form').modal('hide');
                $('.register').modal('show');
            })
            $('#cart-button').click(function() {
                <?php
                if (!isset($_SESSION['current_user']) && !isset($_SESSION['cart'])) {
                    ?>
                    $('.login-form').modal('show');
                <?php
                } else
                if (isset($_SESSION['current_user']) && isset($_SESSION['cart'])) {
                    ?>
                    $('.fa-shopping-cart').click(function() {
                        var htmlAdd;
                        $.ajax({
                            url: "sessionCart.php",
                            dataType: "json",
                            type: "post",
                            success: function(e) {
                                var count = 0;
                                for (var c in e) {
                                    count++;
                                }
                                var total = 0;
                                for ($i = 0; $i < count; $i++) {
                                    htmlAdd += '<tr id="row' + e[Object.keys(e)[$i]].id + '">';
                                    htmlAdd += '<td>';
                                    htmlAdd += '<img src="images/' + e[Object.keys(e)[$i]].image + '" alt="">';
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += e[Object.keys(e)[$i]].name;
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += e[Object.keys(e)[$i]].price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += e[Object.keys(e)[$i]].quantity;
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += (e[Object.keys(e)[$i]].quantity * e[Object.keys(e)[$i]].price).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                                    htmlAdd += '</td>';
                                    htmlAdd += '<td>';
                                    htmlAdd += '<a href="#" id="item' + e[Object.keys(e)[$i]].id + '" class="delete-cart"" ><i style="font-size:25px; color:slategray" class="fa fa-trash"></i></a>'
                                    htmlAdd += '</td>';
                                    htmlAdd += '</tr>';
                                    total += (e[Object.keys(e)[$i]].quantity * e[Object.keys(e)[$i]].price);
                                }
                                htmlAdd += '<tr>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '<td class="total">';
                                htmlAdd += '<hr>';
                                htmlAdd += total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");;
                                htmlAdd += '</td>';
                                htmlAdd += '<td>';
                                htmlAdd += '</td>';
                                htmlAdd += '</tr>';
                                $('#cartTable tbody').html(htmlAdd);
                                $('#quantity-product').html(count);
                            }
                        })
                        $(".cart-box").modal('show');
                    })
                <?php
                } else {
                    ?>
                    window.location.href = "product.php?page=1";
                <?php
                }
                ?>
            })
            var passrex = /^[a-z0-9_-]{6,18}$/;
            $('#password-register').keyup(function() {
                if (!passrex.test($('#password-register').val())) {
                    $('.warning-pass').css("display", "block");
                    flag[1] = false;
                } else {
                    $('.warning-pass').css("display", "none");
                    flag[1] = true;
                }
            });
            $('#re-password-register').keyup(function() {
                if ($('#password-register').val() != $('#re-password-register').val()) {
                    $('.warning-repass').css("display", "block");
                    flag[2] = false;
                } else {
                    $('.warning-repass').css("display", "none");
                    flag[2] = true;
                }
            });

            var emailrex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            $('#email').keyup(function() {
                if (!emailrex.test($('#email').val())) {
                    $('.warning-email').css("display", "block");
                    flag[4] = false;
                } else {
                    $('.warning-email').css("display", "none");
                    flag[4] = true;
                }
                if ($('#email').val() == '') {
                    flag[4] = true;
                    $('.warning-email').css("display", "none");
                }
            });
            $('#email').keyup(function() {
                $.ajax({
                    url: "validateRegister/emailRegister.php",
                    type: 'post',
                    data: {
                        email: $('#email').val()
                    },
                    success: function(result) {
                        if (result != '') {
                            $('.warning-email').css("display", "block");
                            $('.warning-email').html(result);
                            flag[5] = false;
                        } else {
                            $('.warning-email').css("display", "none");
                            $('.warning-email').html(result);
                            flag[5] = true;
                        }
                    }
                });
            });
            $('#registerForm').submit(function(e) {
                if (flag[1] && flag[2] && flag[0] && flag[4] && flag[5]) {
                    return true;
                } else {
                    e.preventDefault();
                }
            });
            $('#submit-login').click(function() {
                $.ajax({
                    url: "login.php",
                    type: 'post',
                    data: {
                        id: $('#id-login').val(),
                        password: $('#password-login').val()
                    },
                    success: function(result) {
                        if (result != '') {
                            $('.warning-login').css("display", "block");
                            $('.warning-login').html(result);

                        } else {
                            location.reload();
                        }
                    }
                });
            });

        });
    </script>
    <script>
        var time = "empty";
        var date = "";
        $(document).ready(function() {
            $('.media').click(function() {
                if ($(this).hasClass('service1-active')) {
                    $(this).removeClass('service1-active');
                } else {
                    $('.media').removeClass('service1-active');
                    $(this).addClass('service1-active');
                }
            });
            $('.service-item').click(function() {
                var idItem = $(this).attr("id");
                $.ajax({
                    url: 'getService.php',
                    dataType: 'json',
                    type: "post",
                    data: {
                        id: idItem
                    },
                    success: function(e) {
                        console.log(e);
                        var h = (parseInt(e.time) != 0) ? parseInt(e.time) + " hour : " : "";
                        var m = (e.time - parseInt(e.time)) != 0 ? (((e.time - parseInt(e.time)) * 60) + " mins") : "00m";
                        $("#time-textbox").html(h + m + ")");
                        $("#name-textbox").html(e.name);
                        $("#description-textbox").html(e.description);
                        $("#price-textbox").html(e.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + " VND (");
                    }
                });
            });
            $('body').on("click", ".delete-cart", function() {
                var idItem = $(this).attr("id");
                var htmlTotal = "";

                idItem = idItem.substring(4);
                $("#row" + idItem).css("display", "none");
                $.ajax({
                    url: "delete-item-cart.php",
                    data: {
                        idItem
                    },
                    type: "post",
                    success: function(e) {
                        htmlTotal += '<hr>';
                        htmlTotal += e.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                        $('.total').html(htmlTotal);
                        count = $("#quantity-product").html();
                        console.log(--count);
                        $("#quantity-product").html(count--);
                    }

                })

            })

            $('.date').change(function() {
                date = $(this).val();

                $(".choose-time td").css("background-color", "white");
                $(".choose-time td").css("cursor", "pointer");
                $(".choose-time td").removeClass("cant-choose");
                $('.choose-time-group').css("display", "block");

                $.ajax({
                    url: "checkBook.php",
                    dataType: "json",
                    data: {
                        date: $(this).val()
                    },
                    type: "post",
                    success: function(e) {
                        for (var i = 0; i < e.length; i++) {
                            $(".choose-time td:contains(" + e[i].substring(0, 5) + ")").css("background-color", "red");
                            $(".choose-time td:contains(" + e[i].substring(0, 5) + ")").css("cursor", "no-drop");
                            $(".choose-time td:contains(" + e[i].substring(0, 5) + ")").addClass("cant-choose");
                        }
                    }
                })

            })
            $(".choose-time td").click(function() {
                $('.choose-time td:not(".cant-choose")').css("background-color", "white");
                $(this).css("background-color", "greenyellow");
                $('.cant-choose').css("background-color", "red");
                time = $(this).html();
            });

            $('.button-booking').click(function(e) {
                var check = false;
                var idService = $(this).attr("id");
                idService = idService.substring(7);
                var phone = $('#phoneee' + idService).val();
                var pattern = /^0[0-9]{9}$/;

                if (!pattern.test(phone)) {
                    $(".announcePhone").html('<span style="color:red;display:block">Please enter valid phone number</span>');
                    return false;
                } else {
                    $(".announcePhone").html('<span style="display:none">Please enter valid phone number</span>');
                }
                $.ajax({
                    url: "sendBooking.php",
                    type: "post",
                    data: {
                        date: date,
                        time: time,
                        idService: idService,
                        phone: phone
                    },
                    success: function(e) {
                        $(".announce").html('<span style="color:red">' + e + '</span>');
                        if (e == "Please choose valid time") return false;
                        $('.choose-time-group').css("display", "none");
                        $('.add-success-box').modal('show');
                        $('.product-details').modal('hide');
                        $('.date').val("");
                    }
                })


            })

        })
    </script>

</body>

</html>