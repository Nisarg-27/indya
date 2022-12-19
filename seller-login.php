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
    <style>
        @import url('https://fonts.googleapis.com/css?family=Baloo+Da+2|Source+Sans+Pro&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Comic+Neue:wght@700&display=swap');
    </style>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../JS/index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/shop.css">
    <link rel="stylesheet" href="CSS/product-list.css">
    <link rel="stylesheet" href="CSS/signup.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <title>indya.com - Kurti</title>
</head>
<body>
<div class="nav">
        <div class="top">
            <div class="box logo">
                <img src="image/logo.png" alt="">
            </div>
            <div class="box search">
                <div class="input">
                    <input type="text" placeholder="Search products.">
                    <button>
                       <img src="MEDIA/search.png" alt="">
                    </button>
                </div>

            </div>
            <div class="box end">
                <span>INR 
                    <img src="image/india.png" alt="" class="india">
                    <img src="image/down.png" alt="" class="down">
                </span>
                <img src="image/user.png" alt="" class="a">
                <a href="cart.php"><img src="image/cart.png" alt="" class="a"></a>
            </div>
        </div>
        <div class="bottom">
            <div class="middle">
            <a href="new.php">New Arrivals</a>
                <a href="kurti.php">Kurti</a>
                <a href="saree.php">Saree</a>
                <a href="lehenga.php">Lehenga Set</a>
                <a href="pants-palazzos.php">Pants & Palazzos</a>
                <a href="dress.php">Dresses</a>
                <a href="shirt.php">Shirts</a>
                <a href="trouser.php">Trousers</a>
                <a href="jacket.php">Nehru Jacket & Blazers</a>
            </div>
        </div>
    </div>
    <div class="signupnew newlogin">
            <div class="sideimg seller">
                <span class="h1">Welcome Back!</span>
                <p>New to Indya?</p>
                <button><a href="seller-signup.php">Click here to signup</button></a>
            </div>
            <div class="form">

                <div class="main-form">
                    <h1>Login</h1>
                    <form action="php/seller-login.inc.php" method="post">
                        <label for="email"><span>Email</span></label>
                        <input type="email" id="email" name="user-name" placeholder="Enter your email">
                        <label for="password"><span>Password</span></label>
                        <input type="password" id="password" name="password" placeholder="Enter password">
                        <button type="submit" name="login-btn">Login</button>
                    </form>
                </div>
            </div>
        </div>

    <div class="footer">
    <div class="mid">
        <img src="image/logo.png" alt="">
        <div class="social">
            <div class="circle"><img src="MEDIA/facebook.png" alt=""></div>
            <div class="circle"><img src="MEDIA/gmail.png" alt=""></div>
            <div class="circle"><img src="MEDIA/instagram.png" alt=""></div>
        </div>
    </div>
    <div class="copyright">
        <span>Indya.com &copy; 2022 All Rights Reserved.</span>
    </div>
</div>
</body>
</html> 