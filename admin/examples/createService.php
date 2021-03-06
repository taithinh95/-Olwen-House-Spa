<?php
session_start();
include "db.php";
if (!isset($_SESSION['current_admin'])) {
    header("location: loginadmin.php");
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Material Dashboard by Creative Tim
    </title>


    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
    <script src="//cdn.ckeditor.com/4.12.1/full/ckeditor.js"></script>
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="../../index.php" class="simple-text logo-normal">
                    Olwen House
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">

                    <li class="nav-item ">
                        <a class="nav-link" href="user.php">
                            <i class="fa fa-users"></i>
                            <p>User Management</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#formsExamples" aria-expanded="true">
                            <i class="material-icons">content_paste</i>
                            <p> Service Management
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse show" id="formsExamples" style>
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="service.php">
                                        <span class="sidebar-mini"><i class="fa fa-eye"></i> </span>
                                        <span class="sidebar-normal"> View Service </span>
                                    </a>
                                </li>
                                <li class="nav-item active">
                                    <a class="nav-link" href="createService.php">
                                        <span class="sidebar-mini"><i class="fa fa-upload"></i></span>
                                        <span class="sidebar-normal"> Upload Service </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#forms1Examples" aria-expanded="true">
                            <i class="material-icons">content_paste</i>
                            <p> Product Management
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse show" id="forms1Examples" style>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="product.php">
                                        <span class="sidebar-mini"><i class="fa fa-eye"></i></span>
                                        <span class="sidebar-normal"> View Product </span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="createProduct.php">
                                        <span class="sidebar-mini"><i class="fa fa-upload"></i></span>
                                        <span class="sidebar-normal"> Upload Product </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item ">
                        <a class="nav-link" href="orders.php">
                            <i class="material-icons">person</i>
                            <p>Orders</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="booking.php">
                            <i class="fa fa-phone"></i>
                            <p>Booking</p>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">person</i>
                                    <p class="d-lg-none d-md-block">
                                        Account
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="logout.php">Log out</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Service Upload Form</h4>
                                </div>
                                <div class="card-body">
                                    <form action="uploadService.php" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Service Name</label>
                                                    <input required type="text" name="serviceName" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-5" style="display:none">
                                                <label>filecount</label>
                                                <input name="filecount" id="filecount" type="text" value="" class="form-control">
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label class="bmd-label-floating">Price (VND)</label>
                                                    <input required type="number" min="1000" max="10000000" name="servicePrice" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Select Type Service</label>
                                                <select required name="typeService" class="browser-default custom-select">
                                                    <option value="1">Skin Care</option>
                                                    <option value="2">Massage</option>
                                                    <option value="3">Waxing</option>
                                                    <option value="4">Whitening</option>
                                                    <option value="5">Other</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3" id="time-group">
                                                <div class="label-time">
                                                    <b>Time:</b>
                                                </div>
                                                <div class="form-group" id="hours">
                                                    <label class="bmd-label-floating">Hours</label>
                                                    <input type="number" step=1 min="0" max="5" name="hours" class="form-control">
                                                </div>
                                                <b>|</b>

                                                <div class="form-group" id="minutes">
                                                    <label class="bmd-label-floating">Minutes</label>
                                                    <input type="number" step=15 min="0" max="60" name="minutes" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <b>Description</b>
                                                <textarea name="serviceDes" placeholder="Description" id="desService" class="form-control" rows="8"></textarea>
                                                <script>
                                                    var config = {};
                                                    config.entities_latin = false;
                                                    config.pasteFromWordRemoveFontStyles = false;
                                                    config.toolbar = [{
                                                            name: 'styles',
                                                            items: ['Styles', 'Format', 'Font', 'FontSize']
                                                        },
                                                        {
                                                            name: 'colors',
                                                            items: ['TextColor', 'BGColor']
                                                        },
                                                        {
                                                            name: 'tools',
                                                            items: ['Maximize']
                                                        },
                                                        {
                                                            name: 'clipboard',
                                                            items: ['Undo', 'Redo']
                                                        },
                                                        {
                                                            name: 'editing',
                                                            items: ['Find', 'Replace', '-', 'SelectAll', '-', 'Scayt']
                                                        },
                                                        {
                                                            name: 'insert',
                                                            items: ['Image', 'Flash', 'Table', 'Smiley', 'SpecialChar', 'Iframe', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-']
                                                        },
                                                        '/',
                                                        {
                                                            name: 'basicstyles',
                                                            items: ['Bold', 'Italic', 'Underline', 'Subscript', 'Superscript', '-', 'CopyFormatting', 'RemoveFormat']
                                                        },
                                                        {
                                                            name: 'paragraph',
                                                            items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', '-', ]
                                                        },
                                                        {
                                                            name: 'links',
                                                            items: ['Link']
                                                        },
                                                        '/',
                                                    ];
                                                    CKEDITOR.replace('desService', config);
                                                </script>
                                            </div>
                                            <div class="col-md-4">
                                                <div>
                                                    <div class="form-group">
                                                        <label class="bmd-label-floating">Upload Images</label>
                                                    </div>
                                                    <input style="margin-top:30px !important" type="file" name="file[]" class="filestyle" data-classButton="btn-white" data-input="true" data-classIcon="icon-plus" multiple data-buttonText="sadasda">
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" value="UPLOAD" name="submit" class="btn btn-primary pull-right"></button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="https://www.creative-tim.com">
                                    Creative Tim
                                </a>
                            </li>
                            <li>
                                <a href="https://creative-tim.com/presentation">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="http://blog.creative-tim.com">
                                    Blog
                                </a>
                            </li>
                            <li>
                                <a href="https://www.creative-tim.com/license">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, made with <i class="material-icons">favorite</i> by
                        <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="../assets/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="../assets/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="../assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="../assets/js/plugins/bootstrap-selectpicker.js"></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="../assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="../assets/js/plugins/fullcalendar.min.js"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="../assets/js/plugins/jquery-jvectormap.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/plugins/nouislider.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="../assets/js/plugins/arrive.min.js"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="../assets/js/plugins/chartist.min.js"></script>
    <!--  Notifications Plugin    -->
    <script src="../assets/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="../assets/demo/demo.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap-filestyle.js"> </script>
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }
                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });
                $(".filestyle").change(function() {
                    $('#filecount').val($(".filestyle").val());
                })
                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');
                    $input = $(this);
                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }
                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }
                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });
    </script>
</body>

</html>