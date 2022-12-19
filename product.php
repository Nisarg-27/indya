<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
require 'PHP/dbh.php';
session_start();
$id = $_GET['id'];
error_reporting(0);

if (isset($_POST["add"])) {
    $radio = $_POST["radio"];
    $d = 0;
    if (is_array($_COOKIE['item'])) {
        foreach ($_COOKIE['item'] as $name => $value) {
            $d = $d + 1;
        }
        $d = $d + 1;
        $_POST['cart-itm'] = $d;
        $_SESSION['cart-itm'] = $_POST['cart-itm'];
    } else {
        $d = $d + 1;
        $_POST['cart-itm'] = $d;
        $_SESSION['cart-itm'] = $_POST['cart-itm'];
    }
    //get the description of the item 
    $res3 = mysqli_query($conn, "SELECT * FROM products WHERE product_id = $id");
    while ($row3  = mysqli_fetch_array($res3)) {
        $id = $row3['product_id'];
        $img = $row3['img'];
        $name = $row3['name'];
        if ($radio === "S") {
            $size = "S";
        } else if($radio === "M") {
            $size = "M";
        } else if($radio === "L") {
            $size = "L";
        } else if($radio === "XL") {
            $size = "XL";
        } 
        
        $price = $row3["price"];
        $qty = "1";
        $total = $price * $qty;
    }

    if (is_array($_COOKIE['item'])) { //for checking if cookie is avaliable
        foreach ($_COOKIE['item'] as $name1 => $value) {
            $value11 = explode("__", $value);
            $found = 0;
            if ($img == $value11[0]) {
                $found = $found + 1;
                $qty = $value11[3] + 1;
                $total = $value11[2] * $qty;
                setcookie("item[$name1]", $img . "__" . $name . "__" . $price . "__" . $qty . "__" . $size . "__" . $total . "__" . $id, time() + 1800);
            }
        }
        if ($found === 0) {
            setcookie("item[$d]", $img . "__" . $name . "__" . $price . "__" . $qty . "__" . $size . "__" . $total . "__" . $id, time() + 1800);
        }
    } else {
        setcookie("item[$d]", $img . "__" . $name . "__" . $price . "__" . $qty . "__" . $size . "__" . $total . "__" . $id, time() + 1800);
    }
}

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
    <link rel="stylesheet" href="CSS/product.css">
    <link rel="stylesheet" href="CSS/footer.css">
    <title>Our Products</title>
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
                        echo '<button name="logout" style="width: 100% !important;height: 100% !important;border: 1px solid #d3b951 !important;background-color: #d3b951 !important;color: white !important;padding: 7px 10px !important;font-weight: 500 !important;border-radius: 10px !important;">Logout</button>';
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
        <h2>Your Product</h2>
        <span>Home >> Our Kurti</span>
    </div>
    
    
    <form name="" method="POST">
    <div class="main-wrap">
   
    <?php
      $result = mysqli_query($conn, "SELECT * FROM `products` where product_id = $id; ");
      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    ?>
        <div class="img">
            <img src="<?php echo $row['img'] ?>" alt="">
        </div>
        <div class="text">
            <span class="momo-name" value="name" ><?php echo $row['name'] ?></span>
            <span class="momo-price" id="price">&#8377; <?php echo  $row['price'] ?> </span>
            <span class="momo-warning"><span class="dot"> </span>Product Type: <?php echo $row['type'] ?></span>
            <span class="momo-warning"><span class="dot"></span>Product Fabric:  <?php echo $row['fabric'] ?></span>
            <span class="momo-quantity">Size <select id="Quantity" name="radio">
                <option value="S" selected>S </option>
                <option value="M" >M</option>
                <option value="L" >L</option>
                <option value="XL" >XL</option>
              </select></span>
            <div class="info">
                <div class="left">
                    <span>Wash Care:</span>
                    <span>Manufacture:</span>
                </div>
                <div class="right">
                    <span> <?php echo $row['wash_care'] ?></span>
                    <span> <?php echo $row['manufacture'] ?></span>
                </div>
            </div>
            <div class="button">
                <button  name="add" type="submit">Add to Cart</button>
            </div>
            
        </div>
        <?php } ?>
      
    </div>
   

    </form>
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
    
</body>
</html>