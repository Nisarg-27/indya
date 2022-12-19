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
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../JS/index.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/shop.css">
    <link rel="stylesheet" href="CSS/product-list.css">

    <link rel="stylesheet" href="CSS/footer.css">
    <title>indya.com - Search Result</title>
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
    <div class="header">
        <h2>Search Result</h2>
        <span>Products >> Search Result</span>
    </div>
   
    <div class="tray">
    <?php
            if (isset($_POST['search-button'])) {
                $text = $_POST['search-text'];
                $text = preg_replace("#[^0-9a-z]#i", "", $text);
                $output = "";

                $sql = "SELECT * FROM products WHERE name LIKE '%$text%'";
                $result = $conn->query($sql);
                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        echo ' <a href="product.php?id='.$row['product_id'].'">';
                        echo '<img src="'.$row['img'].'" alt="">';
                        echo '<span class="name">'.$row['name'].'</span>';
                        echo '<div class="last"><span>&#8377;'.$row["price"].'</span><span class="old">  &#8377; '. $row["price"] + 100 .' </span></div>';
                        echo '</a>';
                        
                    }
                } else {
                    echo '<h1 class="no">No result found</h1>';
                }
            }

            ?>
        
       
        
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