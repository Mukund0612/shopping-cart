<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- Header section -->
    <div class="container">
        <div class="header">
            <img src="assets/images/logo.png" alt="" width="150px">
            <h1>Shopping</h1>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="cart-header">
                    <h3>Your Cart(<?php print_r(count($_SESSION['cart']['item_id'])); ?>)</h3>
                </div>
                <div class="row" style="padding:50px 13px;">
                    <div class="col-md-3">
                        <img Class="w-100" src="assets/images/Product01.jpg" alt="product Image">
                    </div>
                    <div class="col-md-6" style="height:100px;background-color:green;"></div>
                    <div class="col-md-3" style="height:100px;background-color:red;"></div>
                </div>
            </div>
            <div class="col-md-4 showprice">

            </div>
        </div>
    </div>
</body>

</html>