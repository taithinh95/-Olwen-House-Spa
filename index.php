<?php
session_start();
require_once "recaptchalib.php";
include 'admin/examples/db.php';
include 'FacebookLogin/facebook_source.php';
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Owen House" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <script>
        function enableBtn() {
            $('#button-submit').removeAttr('disabled');
        };
    </script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    <link rel="shortcut icon" href="./images/logo.jpg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.5/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
</head>

<body>

    <!-- home -->
    <section id="home">
        <!--/top-nav -->
        <div class="top_w3pvt_main container">
            <!--/header -->
            <header class="nav_w3pvt text-center ">
                <!-- nav -->
                <nav class="wthree-w3ls">
                    <div id="logo">
                        <h1> <a class="navbar-brand px-0 mx-0" href="index.html">Owen House
                            </a>
                        </h1>
                    </div>
                    <label for="drop" class="toggle">Menu</label>
                    <input type="checkbox" id="drop" />
                    <ul class="menu mr-auto">
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="services.php?page=1">Services</a></li>
                        <li><a href="product.php?page=1">Product</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li>

                            <a id="name-after-login" href="#" id="sign-in-drop">Log in <span class="fa fa-angle-down" aria-hidden="true"></span></a>
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
                                <button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
                            </div>
                        </div>
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
                                <button id="register-button-directive" type="button" class="btn btn-danger">Register</button>
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
                            <input type="text" value="<?php if (isset($_SESSION['current_user'])) echo $_SESSION['current_user']['name'] ?>" name="fullname" class="form-control">
                            <div id="gender-group">
                                Male <input id="gender-male" type="radio" value="0" name="gender" checked> |
                                Female <input id="gender-female" type="radio" value="1" name="gender">
                            </div>
                        </div>
                        <div class="form-group register-form-group">
                            <label>Phone</label>
                            <input type="text" pattern="^0[0-9]{9}$" name="phone" value="<?php if (isset($_SESSION['current_user'])) echo $_SESSION['current_user']['phone'] ?>" class="form-control">

                        </div>
                        <div class="form-group register-form-group">
                            <label>Email</label>
                            <input class="form-control" value="<?php if (isset($_SESSION['current_user'])) $_SESSION['current_user']['email'] ?>" disabled>
                        </div>
                        <div class="form-group register-form-group">
                            <label>Address</label>
                            <input type="text" name="address" value="<?php if (isset($_SESSION['current_user'])) $_SESSION['current_user']['address'] ?>" class="form-control">
                        </div>
                        <div class="form-group register-form-group">
                            <label>Date of Birth</label>
                            <input class="form-control" value="<?php if (isset($_SESSION['current_user'])) $_SESSION['current_user']['dob'] ?>" name="dob" type="date" placeholder="Birthdate" name="birthday">
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
        <!-- //top-nav -->
        <!-- banner slider -->
        <div id="homepage-slider" class="st-slider">
            <input type="radio" class="cs_anchor radio" name="slider" id="play1" checked="" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide1" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide2" />
            <input type="radio" class="cs_anchor radio" name="slider" id="slide3" />
            <div class="images">
                <div class="images-inner">
                    <div class="image-slide">
                        <div class="banner-w3pvt-1">
                            <div class="overlay-w3ls">
                            </div>
                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3pvt-2">
                            <div class="overlay-w3ls">

                            </div>
                        </div>
                    </div>
                    <div class="image-slide">
                        <div class="banner-w3pvt-3">
                            <div class="overlay-w3ls">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="labels">
                <div class="fake-radio">
                    <label for="slide1" class="radio-btn"></label>
                    <label for="slide2" class="radio-btn"></label>
                    <label for="slide3" class="radio-btn"></label>
                </div>
            </div>
            <!-- banner-hny-info -->
            <div class="banner-hny-info">
                <h3>SPA SALON
                    <br>RELAX AND REFRESH</h3>
                <div class="top-buttons mx-auto text-center mt-md-5 mt-3">
                    <a href="contact.php" class="btn">Contact Us</a>
                </div>


            </div>
            <!-- //banner-hny-info -->
        </div>
        <!-- //banner slider -->
    </section>
    <!-- //banner -->

    <!-- //home -->

    <!-- about -->
    <section class="about py-5">
        <div class="container p-md-5">
            <div class="about-hny-info text-left px-md-5">
                <h3 class="tittle-w3ls mb-3"><span class="pink">We</span> Make A Good Experience</h3>
                <p class="sub-tittle mt-3 mb-4">Olwen House Spa has affirmed its brand when reaching the Top 3 "Brands, Prestigious Quality and Fat Reduction Services in 2017". The award was awarded by the Vietnam Business Development Union in collaboration with the Intellectual Property Development Center - Intellectual Property Department - Ministry of Science and Technology.</p>
            </div>
        </div>
    </section>


    <!-- //about -->
    <!--/ab-->

    <section class="banner_bottom py-5">
        <div class="container py-md-5">
            <div class="row inner_sec_info">

                <div class="col-md-6 banner_bottom_grid help">
                    <img src="images/spa-img6.jpg" alt=" " class="img-fluid">
                </div>
                <div class="col-md-6 banner_bottom_left mt-lg-0 mt-4">
                    <h4><a class="link-hny" href="services.php?page=1">
                            What Do You Need About Service</a></h4>
                    <p>
                        Professional Olwen House Spa skin care process will help customers relax and deepen skin. At the same time, it promotes the regeneration of new skin cells, bringing smoothness and youthful beauty to the skin. In particular, Spa's services will help you solve root problems of acne: acne bran, acne cover, pustules, blackheads, dry and lumpy skin, lack of water, help improve smooth and fresh skin surface shining.</p>
                    <p>With thoughtful, conscientious and understanding criteria, Olwen House Spa is a place to accompany customers to share precious time with attentive and caring service. Customers can experience professional and effective skincare treatments and skin care consultations with professionals with more than 10 years of experience. Relaxing feeling at Spa will bring freshness and confidence to customers.
                    </p>

                    <a class="btn more black mt-3" href="services.php?page=1" role="button">Services Info</a>

                </div>
            </div>
            <div class="row features-w3pvt-main" id="features">
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-globe" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Beauty Center</a></h4>
                            <p>
                                Beauty care center for everyone.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-laptop" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Spa Center</a></h4>
                            <p>With completely advanced services, help people get a perfect identity.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 feature-gird">
                    <div class="row features-hny-inner-gd">
                        <div class="col-md-3 featured_grid_left">
                            <div class="icon_left_grid">
                                <span class="fa fa-handshake-o" aria-hidden="true"></span>
                            </div>
                        </div>
                        <div class="col-md-9 featured_grid_right_info pl-lg-0">
                            <h4><a class="link-hny" href="single.html">Massage Center</a></h4>
                            <p>
                                Massage services with experienced staff, helping people relieve pressure after straight working hours.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--//ab-->

    <!--/services-->
    <section class="services" id="services">
        <div class="over-lay-blue py-5">
            <div class="container py-md-5">
                <div class="row my-4">
                    <div class="col-lg-5 services-innfo pr-5">
                        <h3 class="tittle-w3ls two mb-3 text-left"><span class="pink">Why</span> Choose Us</h3>
                        <p class="sub-tittle mt-3 mb-sm-3 text-left">
                            We are committed by the experience experienced, Olwen House will bring a perfect experience...</p>

                    </div>
                    <div class="col-lg-7 services-grid-inf">
                        <div class="row services-w3pvt-main mt-5">
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-paint-brush" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">ORGANIC TREATMENT</a></h4>
                                        <p>With organic, non-toxic, environmentally friendly therapies.

                                        </p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-bullhorn" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">CUSTOMIZED PRODUCTS</a></h4>
                                        <p>
                                            These products bring the core value and contribute to beauty.
                                        </p>

                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row services-w3pvt-main mt-5">
                            <div class="col-lg-6 feature-gird ">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-shield" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">EXPERT THERAPISTS</a></h4>
                                        <p>With experienced therapists, customers will be assured of quality service.

                                        </p>

                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-6 feature-gird">
                                <div class="row features-hny-inner-gd mt-3">
                                    <div class="col-md-2 featured_grid_left">
                                        <div class="icon_left_grid">
                                            <span class="fa fa-lightbulb-o" aria-hidden="true"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-10 featured_grid_right_info">
                                        <h4><a class="link-hny" href="single.html">FRIENDLY ENVIRONMENT</a></h4>
                                        <p>
                                            We are committed to all materials used will be environmentally friendly.
                                        </p>

                                    </div>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//services-->
    <!-- /projects -->
    <?php

    $resultProduct = mysqli_query($con, 'select * from product order by selled desc limit 3');

    ?>
    <section class="projects py-5" id="gallery">
        <div class="container py-md-5">
            <h3 class="tittle-w3ls text-left mb-5"><span class="pink">Hot</span> Products <a href="product.php?page=1" class="show-all">View more...</a></h3>
            <div class="row news-grids mt-md-5 mt-4 text-center">
                <?php
                while ($row = mysqli_fetch_assoc($resultProduct)) {
                    $result_images = mysqli_query($con, "select * from product_images where productId=" . $row['id'] . " and avatar=1");
                    if ($result_images->num_rows == 0) {
                        $result_images = mysqli_query($con, "select * FROM product_images where productId=" . $row['id']);
                    }
                    $row_images = mysqli_fetch_assoc($result_images);

                    ?>
                    <div class="col-md-4 gal-img" data-toggle="modal" data-target="#product<?= $row['id'] ?>">
                        <img src="images/<?php echo $row_images['image_link'] ?>" alt="<?= $row_images['image_link'] ?>">
                        <div class="gal-info">
                            <h5><?php echo $row['name'] ?><span class="decription"><?php echo number_format($row['price'], 0, '', '.') ?> VND</span></h5>
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
                                                    <?php $result_images_slide = mysqli_query($con, "select * from product_images where productId=" . $row['id'] . " and avatar=1");
                                                    if ($result_images_slide->num_rows == 0) {
                                                        $result_images_slide = mysqli_query($con, "select * from product_images where productId=" . $row['id'] . " limit 1");
                                                    }
                                                    while ($row_images = mysqli_fetch_assoc($result_images_slide)) { ?>
                                                        <div class="carousel-item active">

                                                            <img class="d-block w-100" src="images/<?= $row_images['image_link'] ?>" alt="<?= $row_images['image_link'] ?>">

                                                        </div>
                                                    <?php } ?>
                                                    <?php $result_images_slide = mysqli_query($con, "select * from product_images where productId=" . $row['id']);
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
                                        <div class="offset-sm-2 col-md-7 offset-md-0">
                                            <h3 class="h1 product-single__title">
                                                <?= $row['name'] ?>
                                            </h3>
                                            <div class="product-single__price">
                                                <div class="product-price">
                                                    <span class="cart-price">
                                                        <u><?= number_format($row['price'], 0, '', '.') ?> VND</u>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="description-product"><?= $row['description'] ?>
                                            </div>
                                            <div class="button-quantity">
                                                <button id="add<?= $row['id'] ?>" class="btn more black add-to-card">Add To Cart</button>
                                                <input id="quan<?= $row['id'] ?>" type="number" value="1" min="1">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>


        </div>
    </section>
    <!-- //projects -->

    <!--/mid-->

    <!--//mid-->

    <!--/testimonials-->
    <section class="testmonials" id="test">
        <div class="over-lay-blue py-5">
            <div class="container py-md-5">
                <h3 class="tittle-w3ls two text-center mb-5">Feedback</h3>
                <div class="row my-4">
                    <div class="col-lg-3 testimonials_grid mt-3">
                        <div class="p-lg-5 p-4 testimonials-gd-vj">
                            <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span> Friendly staff, good service quality.
                            </p>
                            <div class="row mt-4">

                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Thomas Carl</h5>
                      
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 testimonials_grid mt-3">
                        <div class="p-lg-5 p-4 testimonials-gd-vj">
                            <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span>
                                I rate 5 stars for quality staff here.
                            </p>
                            <div class="row mt-4">


                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Edison</h5>
                              
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 testimonials_grid mt-3">
                        <div class="p-lg-5 p-4 testimonials-gd-vj">
                            <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span>
                                Looking forward to spa will have more types of services.
                            </p>
                            <div class="row mt-4">

                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Anna Walker</h5>
                         
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 testimonials_grid mt-3">
                        <div class="p-lg-5 p-4 testimonials-gd-vj">
                            <p class="sub-test"><span class="fa fa-quote-left s4" aria-hidden="true"></span>
                                I am very pleased with the staff attitude, but need to do better on the service part.
                            </p>
                            <div class="row mt-4">

                                <div class="col-9 testi_grid">
                                    <h5 class="mb-2">Hanh Vo</h5>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--//testimonials-->

    <!-- /news-letter -->

    <!-- //news-letter -->

    <!-- footer -->
    <footer class="py-lg-5 py-4">
        <div class="container py-sm-3">
            <div class="row footer-grids">
                <div class="col-lg-4 mt-4">

                    <h2> <a class="navbar-brand px-0 mx-0 mb-4" href="index.html">OWEN HOUSE
                        </a>
                    </h2>
                    <p class="mb-3">Olwen House Spa has affirmed its brand when reaching the Top 3 "Brands, Prestigious Quality and Fat Reduction Services in 2017". The award was awarded by the Vietnam Business Development Union in collaboration with the Intellectual Property Development Center - Intellectual Property Department - Ministry of Science and Technology.</p>

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
                                <a href="index.html"><span class="fa fa-angle-double-right" aria-hidden="true"></span>
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
                    <p><span class="fa fa-map-marker"></span>FPT-Aptech Computer Education HCM, Cách Mạng Tháng 8,
                        phường 11, Quận 3, Hồ Chí Minh</span></p>
                    <p class="phone"><span class="fa fa-phone"></span> 0908663101</p>
                    <p class="phone"><span class="fa fa-fax"></span> 0908663101</p>
                    <p><span class="fa fa-envelope"></span><a href="mailto:letuyettrinh10c12@gmail.comm">letuyettrinh10c12@gmail.com</a></p>
                </div>

            </div>
        </div>
    </footer>
    <!-- //footer -->
    <!-- copyright -->
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
                <div class="noti"></div>
                <div class="button-group button-group-cart">
                    <button class="btn btn-info" data-dismiss="modal">Continue To Shopping</button>
                    <button class="btn btn-info go-to-card" data-dismiss="modal">Go To Cart</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.5/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
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
        var objP;
        var count = 1;
        $(document).ready(function() {
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
                } else if (isset($_SESSION['current_user']) && !isset($_SESSION['cart'])) {
                    ?>
                    window.location.href = "product.php?page=1";
                <?php
                }
                ?>
            })
            $("[type='number']").keypress(function(evt) {
                evt.preventDefault();
            });
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
            $("#select-type-booking").change(function() {
                $.ajax({
                    type: "post",
                    url: 'getServiceBooking.php',
                    dataType: "json",
                    data: {
                        typeBooking: $(this).val()
                    },
                    success: function(e) {

                        var objS = e;
                        var html;
                        $('#serviceTable').DataTable().destroy();
                        $('#choose-service').css("display", "block");
                        for (var i = 0; i < objS.length; i++) {
                            html += '<td>';
                            html += objS[i].name;
                            html += '</td>';
                            html += '<td>';
                            html += objS[i].price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                            html += '</td>';
                            html += '<td>';
                            html += ((parseInt(objS[i].time) != 0) ? parseInt(objS[i].time) + "h:" : "");
                            html += (objS[i].time - parseInt(objS[i].time)) != 0 ? (((objS[i].time - parseInt(objS[i].time)) * 60) + "m") : "00m";
                            html += '</td>';
                            html += '<td>';
                            html += '<a id="choose' + objS[i].id + '" href="">Choose</a>';
                            html += '</td>';
                            html += '</tr>';
                        }
                        $('#choose-service tbody').html(html);
                        $('#serviceTable').DataTable({
                            "bLengthChange": false,
                            "bInfo": false,
                            rowReorder: {
                                selector: 'td:nth-child(2)'
                            },
                            responsive: true
                        });
                    }
                })
            })
            $('.go-to-card').click(function() {
                $('.cart-box').modal('show');
            })

            $('.add-to-card').click(function() {
                $('.product-details').modal('hide');
                <?php
                if (!isset($_SESSION['current_user'])) {
                    ?>
                    $('.login-form').modal('show');
                    return false;
                <?php

                }
                ?>
                var productId = $(this).attr("id");
                productId = productId.substring(3);
                var quantity = $(this).next().val();
                var htmlAdd;
                $.ajax({
                    url: "cart.php",
                    dataType: "json",
                    data: {
                        id: productId,
                        quantity: quantity
                    },
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
                $('.add-success-box').modal('show');
            });
            $('body').on("click", ".delete-cart", function() {
                var idItem = $(this).attr("id");
                var htmlTotal = "";

                idItem = idItem.substring(4);
                $("#row" + idItem).css("display", "none");
                $.ajax({
                    url: "delete-item-cart.php",
                    data: {
                        idItem: idItem
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
        });
    </script>
</body>

</html>