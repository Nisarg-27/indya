<?php 
error_reporting(E_ALL); 
require 'php/dbh.php';
session_start();
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="JS/index.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/seller.css">
    <title>Seller Dashboard</title>
</head>
<body>
    <div class="left">
        <div class="logo">
            <img src="image/logo.png" alt="">
        </div>

        <a class="block" href="seller.php">
            <span>Account</span>
        </a>
        <a class="block" href="seller-orders.php">
            <span>Orders</span>
        </a>
        <a class="block active" href="seller-product.php">
            <span>Products</span>
        </a>
        <a class="block" href="seller-add.php">
            <span>Add Products</span>
        </a>
        <a class="block" href="#">
            <span>Logout</span>
        </a>

    </div>
    <div class="right">
        <div class="products">
        <?php
            $result = mysqli_query($conn, "SELECT * FROM `products`; ");
            while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="box">
                <span>Id: <?php echo $row['product_id'] ?></span>
                <img src="<?php echo $row['img'] ?>" alt="">
                <span><?php echo $row['name'] ?></span>
                <span>&#8377; <?php echo $row['price'] ?></span>
            </div>
        <?php } ?>
            
        </div>
    </div>
</body>
</html>