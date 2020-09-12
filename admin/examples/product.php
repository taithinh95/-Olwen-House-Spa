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
  <meta charset="utf-8" />
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
                    <span class="sidebar-mini"><i class="fa fa-eye"></i></span>
                    <span class="sidebar-normal"> View Service </span>
                  </a>
                </li>
                <li class="nav-item ">
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
                <li class="nav-item active">
                  <a class="nav-link" href="product.html">
                    <span class="sidebar-mini"> <i class="fa fa-eye"></i> </span>
                    <span class="sidebar-normal"> View Product </span>
                  </a>
                </li>
                <li class="nav-item ">
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
                  <h4 class="card-title ">PRODUCTS MANAGEMENT TABLE</h4>
                </div>
                <div class="card-body">
                  <table id="productTable" class="stripe" style="width:100%">
                    <thead>
                      <tr>
                        <th></th>
                        <th>NAME</th>
                        <th>PRICE</th>
                        <th>IN STOCK</th>
                        <th>SELLED</th>
                        <th>EDIT</th>
                        <!-- <th>STOP SELLING</th> -->
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $table_product_catalog = mysqli_query($con, "select id, name as productName, price,inStock,selled from product");
                      while ($row = mysqli_fetch_assoc($table_product_catalog)) {

                        $table_product_image = mysqli_query($con, "select * FROM product_images where productId=" . $row['id'] . " and avatar=1");
                        if ($table_product_image->num_rows == 0) {
                          $table_product_image = mysqli_query($con, "select * FROM product_images where productId=" . $row['id']);
                        }
                        ?>
                        <tr id="rowTable<?= $row['id'] ?>">
                          <td><?php while ($row_images = mysqli_fetch_assoc($table_product_image)) {
                                ?>
                              <img src="../../images/<?= $row_images['image_link'] ?>" alt="<?= $row['productName'] ?>">
                              <?php
                              break;
                            } ?></td>
                          <td><?= $row['productName'] ?></td>
                          <td><?= number_format($row['price'], 0, '', '.') ?></td>
                          <td><?= $row['inStock'] ?></td>
                          <td><?= $row['selled'] ?></td>
                          <td><a data-toggle="modal" data-target=".edit-form" class="edit-button" href="#" id="product<?= $row['id'] ?>"><i style="font-size:25px;" class="fa fa-edit"></i></a></td>
                          <!-- <td class="delete-button" id="delete<?= $row['id'] ?>"><a href="#"><i style="font-size:25px; color:slategray" class="fa fa-trash"></i></a></td> -->
                        </tr>
                      <?php }
                      mysqli_close($con);
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade edit-form" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="editProduct.php" enctype="multipart/form-data" method="POST">
              <legend>PRODUCTS EDITER FORM</legend>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-5" style="display:none">
                    <label>avatar</label>
                    <input name="avatar" id="avatar" type="text" value="" class="form-control">
                  </div>
                  <div class="col-md-5" style="display:none">
                    <label>filecount</label>
                    <input name="filecount" id="filecount" type="text" value="" class="form-control">
                  </div>
                  <div class="col-md-5" style="display:none;">
                    <label>id</label>
                    <input name="idProduct" id="idProduct" type="text" value="" class="form-control" required>
                  </div>
                  <div class="col-md-5">
                    <label>Name</label>
                    <input id="name-textbox" name="name" type="text" value="" class="form-control" required>
                  </div>
                  <div class="col-md-2">
                    <label>Price</label>
                    <input id="price-textbox" max="10000000" name="price" type="number" min=1000 class="form-control" required="required">
                  </div>
                  <div class="col-md-2">
                    <label>In Stock</label>
                    <a href="#"><i style="font-size:125%;" data-toggle="tooltip" data-placement="top" title="Add more quantity" class="fa fa-plus-circle addQuantity"></i></a>
                    <input style="text-align:center;" id="instock-textbox" name="inStock" readonly="readonly" type="number" class="form-control" required="required">
                  </div>
                  <div class="col-md-1 add-textbox">
                    <label>.</label>
                    <input disabled="disabled" style="text-align:center" value="+" class="form-control">
                  </div>
                  <div class="col-md-2 add-textbox">
                    <label>Quantity</label>
                    <input style="text-align:center;"id="add-textbox" max="10000" name="add-quantity" value="0" type="number" min="0" class="form-control" required="required">
                  </div>
                </div>
              </div>
              <div class="container-fluid">
                <label>Description</label>
                <textarea name="productDes" placeholder="Description" id="desService" class="form-control" rows="8"></textarea>
                <script>
                  var config = {};
                  config.entities_latin = false;
                  config.pasteFromWordRemoveFontStyles = false;
                  config.toolbar = [{
                      name: 'styles',
                      items: ['Source', 'Styles', 'Format', 'Font', 'FontSize']
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
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Choose Avatar</label>
                    </div>
                    <div id="img-edit-box">

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="bmd-label-floating">Add Images</label>
                    </div>
                    <input type="file" name="file[]" class="filestyle" data-classButton="btn-white" value="file" data-input="true" data-classIcon="icon-plus" multiple>
                  </div>
                </div>
              </div>

              <div class="register-form-group">
                <div class="button-group">
                  <button id="submit-edit" name="submit" type="submit" class="btn btn-info">Save</button>
                  <button data-dismiss="modal" type="button" class="btn btn-danger">Close</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="modal fade delete-alert" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <h2 style="text-align:center; margin:20px;auto">Are you sure to delete this product?</h2>
            <div style="margin: 20px auto;">
              <button id="delete-accept" data-dismiss="modal">Delete</button>
              <button data-dismiss="modal">Cancel</button>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <script type="text/javascript" src="../assets/js/bootstrap-filestyle.js"> </script>
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
        $()
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

  <script>
    var idTrash;
    $(document).ready(function() {
      $('#productTable').DataTable({
        "pageLength": 30,
        "bLengthChange": false
      });
      $('body').on("click",".edit-button",function() {
        var idItem = $(this).attr("id");
        $.ajax({
          url: 'getProduct.php',
          dataType: 'json',
          type: "post",
          data: {
            id: idItem
          },
          success: function(e) {
            console.log(e);
            $("#name-textbox").val(e.name);
            $("#idProduct").val(e.id);
            $("#price-textbox").val(e.price);
            $("#instock-textbox").val(e.inStock);
            CKEDITOR.instances["desService"].setData(e.description);
            var images = "";
            if (e.hasOwnProperty('image_list')) {
              for (var i = 0; i < e.image_list.length; i++) {
                images += '<img class="img-edit-product" src="../../images/' + e.image_list[i]['image_link'] + '" alt="' + e.image_list[i]['image_link'] + '">';
              }
            }
            $('#img-edit-box').html(images);
          }
        });
      });

      $('.addQuantity').click(function() {
        $('.add-textbox').css("display", "block");
      });
      $('body').on("click", "#img-edit-box img", function() {
        $('#img-edit-box img').css("border", "none");
        $('#img-edit-box img').removeClass("avatar");
        $(this).css("border", "3px solid yellowgreen");
        $("#avatar").val($(this).attr('alt'));
      })
      $('.delete-button').click(function() {
        idTrash = ($(this).attr("id")).substring(6);
        $('.delete-alert').modal('show');
      })
      $('#delete-accept').click(function() {
        $.ajax({
          type: "post",
          url: "deleteProduct.php",
          data: {
            id: idTrash
          }
        });
        $('#rowTable' + idTrash).css("display", "none");
      })
      $(".filestyle").change(function() {
        $('#filecount').val($(".filestyle").val());
      })
    })
  </script>

</body>

</html>