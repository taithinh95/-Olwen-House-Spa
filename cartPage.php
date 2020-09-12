<?php
include 'admin/examples/db.php';
session_start();
require_once "recaptchalib.php";
include 'FacebookLogin/facebook_source.php';
?>
<!DOCTYPE html>
<html  lang="zxx">

<head>
    <title>Cart</title>
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
    <link rel="shortcut icon" href="./images/logo.jpg">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
    <link href="css/font-awesome.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>

<body>
    <h2 style="text-align:center;border-bottom:1px solid black" class="section-header">CART</h2>
    <table id="cartTable" style="width:100%;" class="border-cells">
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
            <?php foreach ($_SESSION['cart'] as $key1 => $value1) {
                ?>
                <tr id="row<?=$value1['id']?>">
                    <td><img src="images/<?=$value1['image']?>" alt="<?=$value1['image']?>"></td>
                    <td><?=$value1['name']?></td>
                    <td><?=$value1['price']?></td>
                    <td><?=$value1['quantity']?></td>
                    <td><?=$value1['price'] * $value1['quantity']?></td>
                    <td class="delete-cart" id="item<?=$value1['id']?>"><a href="#"><i style="font-size:25px; color:slategray" class="fa fa-trash"></i></a></td>
                </tr>
                <?php
            }
            ?>

        </tbody>
    </table>
    <button class="btn more black btn-purchase" type="button">PURCHASE</button>

    <script>
        $(document).ready(function(){
            $('.delete-cart').click(function(){
                var idItem = $(this).attr("id");
                idItem = idItem.substring(4);
                $("#row"+idItem).css("display","none");
                $.ajax({
                    url:"delete-item-cart.php",
                    data:{idItem},
                    type:"post",
                    success : function(e){

                    }
                })

            })
        })
    </script>
</body>

</html>