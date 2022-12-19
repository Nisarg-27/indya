<?php
error_reporting(E_ALL); 
require '../php/dbh.php';
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
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/shop.css">
    <link rel="stylesheet" href="../CSS/changes.css">
    <link rel="stylesheet" type="text/css" MEDIA="screen" href="../css/plugins.css" />
	<link rel="stylesheet" type="text/css" MEDIA="screen" href="../css/main.css" />

    <title>Our Momos</title>
</head>
<body>
    <div class="nav nav2">
        <div class="logo">
            <img src="../MEDIA/frozen-momo-logos/amizmo-logos_black-2.png">
        </div>
        <div class="menu">
            <a href="../index.php">Home</a>
            <span>|</span>
            <a href="index.php">Our Momos</a>
            <span>|</span>
            <a href="#">How to Cook?</a>
            <span>|</span>
            <a href="#">Contact Us</a>
            <span>|</span>
            <a href="#">My Cart</a>
        </div>
        <div class="login">
            <button>Login/Register</button>
        </div>
        <div class="bar">
            <img src="../MEDIA/menu.png" alt="" id="drop-menu">
        </div>
    </div>
    <div class="mobile mobile2" id="mobile">
        <a href="../index.php">Home</a>
           <a href="index.php">Our Momos</a>
           <a href="#">How to Cook?</a>
           <a href="#">Contact Us</a>
           <a href="#">My Cart</a>
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
                                    <div class="cart-item">
                                        <img src="<?php echo $value11[0] ?>" alt="">
                                        <span class="name" ><?php echo $value11[1] ?></span>
                                        <span class="pieces" >(<?php echo $value11[4]   ?> Pieces)</span>
                                        <span class="prices" >&#8377; <?php echo $value11[2]   ?> <button name="delete<?php echo $name1 ?>"> <i class="far fa-trash-alt" ></i> </button> </span>
                                    </div>
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
                                            <th class="pro-price">Pack of</th>
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
                                                <div class="coupon-block">
                                                    <div class="coupon-text">
                                                        <label for="coupon_code">Coupon:</label>
                                                        <input type="text" name="coupon_code" class="input-text"
                                                            id="coupon_code" value="" placeholder="Coupon code">
                                                    </div>
                                                    <div class="coupon-btn">
                                                        <input  class="btn btn-outlined"
                                                            name="apply_coupon" value="Apply coupon" style=" background-color: #1f5972!important; border: none!important; color: white; ">
                                                    </div>
                                                </div>
                                               
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                       
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-section-2">
            <div class="container">
                <div class="row">
                   
                    <!-- Cart Summary -->
                    <div class="col-lg-6 col-12 d-flex">
                        <form method="POST" action="../PHP/checkoutDBH.php" >
                        <div class="cart-summary">
                            <div class="cart-summary-wrap">
                                <h4><span>Cart Summary</span></h4>
                                <p>Sub Total <span class="text-primary" style="color: #1f5972!important;">&#8377; <?php echo $_SESSION["total"] ?></span></p>
                                <p>Shipping Cost <span class="text-primary" style="color: #1f5972!important;">&#8377; 50.00</span></p>
                                <h2>Grand Total <span class="text-primary" style="color: #1f5972!important;">&#8377; <?php echo ($_SESSION["total"] + 50) ?></span></h2>
                            </div>
                            <div class="cart-summary-button">
                                <a href="#" class="checkout-btn c-btn btn--primary" style=" background-color: white!important; border: none!important; color:white; ">Checkout</a>
                                <button class="update-btn c-btn btn-outlined" name="submit"  style=" background-color: #1f5972!important; border: none!important; color:white; ">Update Cart</button>
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
            <img src="../MEDIA/frozen-momo-logos/amizmo-logos_black-2.png" alt="">
            <div class="social">
                <div class="circle"><img src="../MEDIA/facebook.png" alt=""></div>
                <div class="circle"><img src="../MEDIA/gmail.png" alt=""></div>
                <div class="circle"><img src="../MEDIA/instagram.png" alt=""></div>
            </div>
        </div>
        <div class="copyright">
            <span>Frozen Momo &copy; 2022 All Rights Reserved.</span>
        </div>
    </div>
</body>
</html>