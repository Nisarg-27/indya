<?php 
error_reporting(E_ALL); 
require '../php/dbh.php';
error_reporting(0);
$products = array();
$no = array();
$d = 0;

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
    <link rel="stylesheet" href="../CSS/shop.css">
    <link rel="stylesheet" href="../CSS/changes.css">
    <link rel="stylesheet" type="text/css" MEDIA="screen" href="../css/plugins.css" />
	<link rel="stylesheet" type="text/css" MEDIA="screen" href="../css/main.css" />
    <link rel="stylesheet" href="../CSS/footer.css">
    <title>Check Out</title>
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
            <a href="cart.php">My Cart</a>
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
           <a href="cart.php">My Cart</a>
   </div>
    <div class="header">
        <h2>Checkout</h2>
        <span>Home >> Cart >> Checkout</span>
    </div>
    <main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<div class="checkout-form">
                            <form action="../PHP/checkoutDBH.php" method="POST">
							<div class="row row-40">
							
								<div class="col-lg-7 mb--20">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40" style="margin-top: 5%;">
										
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>First Name*</label>
												<input type="text" placeholder="First Name" name="first_name">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Last Name*</label>
												<input type="text" placeholder="Last Name" name="last_name">
											</div>
											
											<div class="col-12 col-12 mb--20">
												<label>Country</label>
												<select class="nice-select" name="Country">
													<option value="India">India</option>
												</select>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address" name="email">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number" name="phone">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1" name="address_1">
												
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City" name="city">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" placeholder="State" name="state">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code" name="pincode">
											</div>
											
										</div>
									</div>
									<!-- Shipping Address -->
									
									
								</div>
								<div class="col-lg-5">
									<div class="row">
										<!-- Cart Total -->
										<div class="col-12">
											<div class="checkout-cart-total">
												<h2 class="checkout-title">YOUR ORDER</h2>
												<h4>Product <span>Total</span></h4>
												<ul>
                                                <?php 
                                                    foreach ($_COOKIE['item'] as $name1 => $value) {
                                                        $value11 = explode("__", $value);
                                                        array_push($products, $value11[7]);
                                                        array_push($no, $value11[5]);
                                                        $_SESSION['id'] = $products;
                                                        $_SESSION['no'] = $no;
                                                ?>
													<li><span class="left"><?php echo $value11[1] ?></span> <span
															class="right">&#8377; <?php echo $value11[2]   ?></span></li>
													
                                                <?php } ?>        
												</ul>
												<p>Sub Total <span>&#8377; <?php echo $_SESSION["total"] ?></span></p>
												<p>Shipping Fee <span>&#8377; 50.00</span></p>
												<h4>Grand Total <span>&#8377; <?php echo ($_SESSION["total"] + 50) ?></span></h4>
											
												<div class="term-block" style="margin: 5%;" >
													<input type="checkbox" id="accept_terms2" >
													<label for="accept_terms2">I’ve read and accept the terms &
														conditions</label>
												</div>
												<button class="place-order w-100" style=" background-color: #1f5972!important; border: none!important;" name="checkout">Place order</button>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
                        </form>
					</div>
				</div>
			</div>
		</main>
   

    
<div class="footer">
        <div class="mid">
            <img src="../MEDIA/frozen-momo-logos/amizmo-logos_black-2.png" alt="">
            <div class="social">
                <div class="circle"><img src="../MEDIA/facebook.png" alt=""></div>
                <div class="circle"><img src="../MEDIA/gmail.png" alt=""></div>
                <div class="circle"><img src="../media/instagram.png" alt=""></div>
            </div>
        </div>
        <div class="copyright">
            <span>Frozen Momo &copy; 2022 All Rights Reserved.</span>
        </div>
    </div>
</body>
</html>