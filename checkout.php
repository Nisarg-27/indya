<?php 
error_reporting(E_ALL); 
require 'php/dbh.php';
session_start();
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
    <link rel="stylesheet" href="CSS/menu.css">
    <link rel="stylesheet" href="CSS/shop.css">
    <link rel="stylesheet" href="CSS/changes.css">
    <link rel="stylesheet" type="text/css" MEDIA="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" MEDIA="screen" href="css/main.css" />
    <link rel="stylesheet" href="CSS/footer.css">
    <title>Check Out</title>
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
        <h2>Checkout</h2>
        <span>Home >> Cart >> Checkout</span>
    </div>
    <main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Checkout Form s-->
						<div class="checkout-form">
                            <form action="PHP/checkoutDBH.php" method="POST">
							<div class="row row-40">
							
								<div class="col-lg-7 mb--20">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40" style="margin-top: 5%;">
										
										<div class="row">
											<div class="col-md-6 col-12 mb--20">
												<label>First Name*</label>
												<input type="text" placeholder="First Name" name="first_name" value="<?php  if (isset($_SESSION['name'])) {echo $_SESSION['name'];} ?>">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Last Name*</label>
												<input type="text" placeholder="Last Name" name="last_name" value="<?php  if (isset($_SESSION['last-name'])) {echo $_SESSION['last-name'];} ?>">
											</div>
											
											<div class="col-12 col-12 mb--20">
												<label>Country</label>
												<select class="nice-select" name="Country">
													<option value="India">India</option>
												</select>
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Email Address*</label>
												<input type="email" placeholder="Email Address" name="email" value="<?php  if (isset($_SESSION['email'])) {echo $_SESSION['email'];} ?>">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Phone no*</label>
												<input type="text" placeholder="Phone number" name="phone" value="<?php  if (isset($_SESSION['mobile'])) {echo $_SESSION['mobile'];} ?>">
											</div>
											<div class="col-12 mb--20">
												<label>Address*</label>
												<input type="text" placeholder="Address line 1" name="address_1" value="<?php  if (isset($_SESSION['address_1'])) {echo $_SESSION['address_1'];} ?>">
												
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Town/City*</label>
												<input type="text" placeholder="Town/City" name="city" value="<?php  if (isset($_SESSION['city_1'])) {echo $_SESSION['city_1'];} ?>">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>State*</label>
												<input type="text" placeholder="State" name="state" value="<?php  if (isset($_SESSION['district_1'])) {echo $_SESSION['district_1'];} ?>">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Zip Code*</label>
												<input type="text" placeholder="Zip Code" name="pincode" value="<?php  if (isset($_SESSION['pincode_1'])) {echo $_SESSION['pincode_1'];} ?>">
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
                                                <?php
                                                    if (isset($_SESSION['customer_id'])) {
                                                        echo '<button class="place-order w-100" style=" background-color: #d3b951!important; border: none!important;" name="checkout2">Place order</button>';
                                                    } else {
                                                        echo '<button class="place-order w-100" style=" background-color: #d3b951!important; border: none!important;" name="checkout">Place order</button>';
                                                    }
                                                ?>   
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