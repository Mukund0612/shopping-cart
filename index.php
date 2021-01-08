<?php
    include 'config.php';
    // echo "<pre>";
    // unset($_SESSION['cart']);
    // print_r($_SESSION['cart']);
    // exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <!-- Bootstrap Css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css"/>
    <link rel="stylesheet" href="assets/style.css"/>
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="assets/images/logo.png" alt="" width="150px">
            <h1>Shopping</h1>
            <div>
                <a href="my-cart.php" id="<?php
                if (!isset($_SESSION['cart'])) {
                    echo "cart-button";
                }
                ?>" class="btn btn-outline-primary button"><i class="fas fa-shopping-cart cart-icon"></i>Cart (<?php
                if (isset($_SESSION['cart'])) {
                    print_r(count($_SESSION['cart']['item_id']));
                } else {
                    echo "*";
                }
                ?>)</a>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 25px">
        <div class="head-line">
            <h3>HEADPHONE</h3>
        </div>
        <div class="row">
            <?php
                // Fetch product form database
                $query = "SELECT * FROM product WHERE `status`='1'";
                $result = mysqli_query($conn, $query);
                while( $row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-6 col-lg-3 ">
                <div class="image content">
                    <h3><?php echo $row['product_name']; ?></h3>
                    <img class="w-100" src="<?php echo $row['product_image']; ?>" alt="Product Image"/>
                    <b><?php echo $row['selling_price'] ?></b><strike><?php echo $row['original_price']; ?></strike><br>
                    <p><a href="javascript:;" data-id="<?php echo $row['id']; ?>" data-price="<?php echo $row['selling_price']; ?>" class="btn btn-primary btn-cart add_to_cart">Add to Cart</a></p>
                </div>
            </div>
            <?php } // end while loop ?>
        </div>
    </div>
</body>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.add_to_cart').on('click',function(){
                var id = $(this).data('id');
                var price = $(this).data('price');
                $.ajax({
                    url: "http://localhost/shopping_cart/ajax.php",
                    type: "POST",
                    datatype: 'json',
                    data: {
                        flag: 'add_to_cart',
                        pro_id: id,
                        pro_price: price
                    },
                    success:function(data){
                        $('.button').html("<i class='fas fa-shopping-cart cart-icon'></i>Cart ("+data+")");
                        location.reload();
                    }
                })
            });
        });
</script>
</html>