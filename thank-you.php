<?php
    include 'config.php';
    if (!isset($_SESSION['order_id'])) {
        header("Location: index.php");
    }
    $sql = "DELETE FROM `tamp_order_item` WHERE order_id='".$_SESSION['order_id']."'";
    
    $result = mysqli_query($conn, $sql);
    if ($result == 1) {
        unset($_SESSION['cart']);
        unset($_SESSION['order_id']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
        <!-- Bootstrap Css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        <link rel="stylesheet" href="assets/fontawesome/css/all.min.css"/>
        <link rel="stylesheet" href="assets/style.css"/>
        <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
</head>
<body>
    <div class="thank-you">
        <div class="text-center">
            <h1>THANK YOU!</h1>
        </div>
        <div class="text-center pt-4">
            <img src="https://i.pinimg.com/736x/c7/75/fc/c775fc6d3433da085d8f579f54b7c758.jpg" alt="check image" width="100px" />
        </div>
        <div class="pt-4">
            <h5>Your Payment Is SuccessFull.</h5>
        </div>
        <div class="pt-4 text-center">
            <a href="index.php">Continue with Shopping</a>
        </div>
    </div>
</body>
</html>