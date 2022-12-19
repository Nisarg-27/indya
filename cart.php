<?php
error_reporting(E_ALL); 
require 'php/dbh.php';
session_start();
error_reporting(0);
$products = array();
$no = array();
$d = 0;
if (is_array($_COOKIE["item"])) {
    foreach ($_COOKIE["item"] as $name1 => $value) {
        if (isset($_POST["delete$name1"])) {
            $_SESSION['cart-itm'] -= 1;
            setcookie("item[$name1]", "", time() - 1800);
?>
            <script type="text/javascript">
                window.location.href = window.location.href;
            </script>
<?php
        }
    }
}

$tot = 0;
        foreach ($_COOKIE['item'] as $name1 => $value) {
            $value11 = explode("__", $value);
            $tot = $tot + $value11[2];
            $_SESSION["total"] = $tot;
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
    <link rel="stylesheet" href="CSS/footer.css">
    <link rel="stylesheet" href="CSS/shop.css">
    <link rel="stylesheet" href="CSS/changes.css">
    <link rel="stylesheet" type="text/css" MEDIA="screen" href="CSS/plugins.css" />
	<link rel="stylesheet" type="text/css" MEDIA="screen" href="CSS/main.css" />

    <title>Our Cart</title>
</head>
<body>
<div class="nav">
        <div class="top">
            <div class="box logo">
                <img src="image/logo.png" alt="" style="height: 54px; width: 84px;">
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
                    if (isset($_SESSION['cutomer'])) {
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
    <h2>Your Cart</h2>
    <span>Home >> Cart</span>
    </div>  

    <main class="cart-page-main-block inner-page-sec-padding-bottom">
        <div class="cart_area cart-area-padding  ">
            <div class="container">
               
                <div class="row">
                    <div class="col-12">
                      
                            <!-- Cart Table -->
                            <div class="cart-table table-responsive mb--40">
                                <div class="mobile-table-2">
                                <form action="" method="POST">
                                        <?php 
                                            foreach ($_COOKIE['item'] as $name1 => $value) {
                                                $value11 = explode("__", $value);
                                                array_push($products, $value11[6]);
                                                array_push($no, $value11[4]);
                                                $_SESSION['id'] = $products;
                                                $_SESSION['no'] = $no;
                                        ?>
                                    
                                    <?php } ?>
                                </form>
                                </div>
                                <table class="table mobile-table">
                                    <!-- Head Row -->
                                    <thead>
                                        <tr>
                                            <th class="pro-remove"></th>
                                            <th class="pro-thumbnail">Image</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Size</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Product Row -->
                                        <form action="" method="POST">
                                        
                                        <?php 
                                            foreach ($_COOKIE['item'] as $name1 => $value) {
                                                $value11 = explode("__", $value);
                                                array_push($products, $value11[7]);
                                                array_push($no, $value11[4]);
                                                $_SESSION['id'] = $products;
                                                $_SESSION['no'] = $no;
                                        ?>
                                        <tr>
                                            <td class="pro-remove" > <button name="delete<?php echo $name1 ?>"> <i class="far fa-trash-alt" ></i></button>
                                            </td>
                                            <td class="pro-thumbnail"><a href="#"><img
                                                        src="<?php echo $value11[0] ?>" alt="Product"  style="width: 100%; height: 100%"></a></td>
                                            <td class="pro-title"><a href="#"><?php echo $value11[1] ?></a></td>
                                            <td class="pro-price"><span><?php echo $value11[4] ?></span></td>
                                            <td class="pro-quantity">
                                                <div class="pro-qty">
                                                    <div class="count-input-block">
                                                        <input type="number" class="form-control text-center"
                                                            value="1">
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="pro-subtotal"><span>&#8377; <?php echo $value11[2]   ?></span></td>
                                        </tr>
                                        <?php } ?>
                                            </form>
                                        <!-- Product Row -->
                                        
                                        <!-- Discount Row  -->
                                        <tr>
                                            <td colspan="6" class="actions">
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-section-2 " >
            <div class="container">
                <div class="row" style="width:100% !important; display:flex; justify-content:center;">
                   
                    <!-- Cart Summary -->
                    <div class="" style="width:50% !important">
                        <form method="POST" action="PHP/checkoutDBH.php" >
                        <div class="cart-summary"  style="width:100% !important">
                            <div class="cart-summary-wrap"  style="width:100% !important">
                                <h4><span>Cart Summary</span></h4>
                                <p>Sub Total <span class="text-primary" style="color: #d3b951!important;">&#8377; <?php echo $_SESSION["total"] ?></span></p>
                                <p>Shipping Cost <span class="text-primary" style="color: #d3b951!important;">&#8377; 50.00</span></p>
                                <h2>Grand Total <span class="text-primary" style="color: #d3b951!important;">&#8377; <?php echo ($_SESSION["total"] + 50) ?></span></h2>
                            </div>
                            <div class="cart-summary-button" style="width:100% !important; display:flex; justify-content:center;">
                                <?php
                                    if (isset($_SESSION['id'])) {
                                        echo '<button class="update-btn c-btn btn-outlined" name="submit2"  style=" background-color: #d3b951!important; border: none!important; color:white; width:50%;">Check Out</button>';
                                    } else {
                                        echo '<button class="update-btn c-btn btn-outlined" name="submit"  style=" background-color: #d3b951!important; border: none!important; color:white; width:50%;">Check Out</button>';
                                    }
                                    ?>                                
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Cart Page End -->
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
</body>
</html>