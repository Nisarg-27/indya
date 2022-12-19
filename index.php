<?php 
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
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/product-list.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <title>indya.com</title>
</head>
<body>
    <div class="nav">
        <div class="top">
            <div class="box logo">
                <img src="image/logo.png" alt="">
            </div>
            <div class="box search">
                <div class="input">
                <form action="search-result.php" method="POST" style="display: flex; width:100%;">
                    <input type="text" placeholder="Search products." name="search-text">
                    <button name="search-button">
                       <img src="MEDIA/search.png" alt="">
                    </button>
                </form>
                </div>
            </div>
            <div class="box end">
                <span>INR 
                    <img src="image/india.png" alt="" class="india">
                    <img src="image/down.png" alt="" class="down">
                </span>
                <a href="user-login.php"><img src="image/user.png" alt="" class="a"></a>
                <form action="php/logout.inc.php" method="POST">
                <?php
                    if (isset($_SESSION['customer_id'])) {
                        echo '<button name="logout">Logout</button>';
                    } 
                    ?>
                </form>
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
   
    <div class="land-main">
        <div class="heading">
            <img src="MEDIA/hp-mb-13apr22-3.jpg" alt="" srcset="">
        </div>
    </div>

    <div class="tray">
    <?php
            $result = mysqli_query($conn, "SELECT * FROM `products` LIMIT 8; ");
            while ($row = mysqli_fetch_array($result)) {
            ?>
             <a href="product.php?id=<?php echo $row['product_id'] ?>">
            <img src="<?php echo $row['img'] ?>" alt="">
            <span class="name"><?php echo $row['name'] ?></span>
            <div class="last"><span>&#8377; <?php echo $row["price"] ?></span><span class="old">  &#8377; <?php echo $row["price"] + 100 ?> </span></div>
            </a>
               
            <?php } ?>
       
        
    </div>
    
    <div class="banner-1">
        <a href="#">
            <img src="media/Banner/bannee1.jpg" alt="">
        </a>
    </div>

    <div class="banner-2">
        <a href="#"><img src="MEDIA/Banner/motion-1.gif" alt=""></a>
        <a href="#"><img src="MEDIA/Banner/motion-2.gif" alt=""></a>
    </div>
    <div class="tray">
    <?php
            $result = mysqli_query($conn, "SELECT * FROM `products` LIMIT 4; ");
            while ($row = mysqli_fetch_array($result)) {
            ?>
             <a href="product.php?id=<?php echo $row['product_id'] ?>">
            <img src="<?php echo $row['img'] ?>" alt="">
            <span class="name"><?php echo $row['name'] ?></span>
            <div class="last"><span>&#8377; <?php echo $row["price"] ?></span><span class="old">  &#8377; <?php echo $row["price"] + 100 ?> </span></div>
            </a>
               
            <?php } ?>
       
        
    </div>           
    <div class="banner-3">
        <a href="#"><img src="MEDIA/Banner/dress.webp" alt=""></a>
        <a href="#"><img src="MEDIA/Banner/kurta.webp" alt=""></a>
        <a href="#"><img src="MEDIA/Banner/tunic.webp" alt=""></a>
        <a href="#"><img src="MEDIA/Banner/bottom.webp" alt=""></a>
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