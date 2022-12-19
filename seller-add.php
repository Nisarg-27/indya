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
    <link rel="stylesheet" type="text/css" MEDIA="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" MEDIA="screen" href="css/main.css" />
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
        <a class="block" href="seller-product.php">
            <span>Products</span>
        </a>
        <a class="block active" href="seller-add.php">
            <span>Add Products</span>
        </a>
        <a class="block" href="#">
            <span>Logout</span>
        </a>

    </div>
    <div class="right">
        <h1>Add Products</h1>
        <main id="content" class="page-section inner-page-sec-padding-bottom space-db--20">
			<div class="container" >
				<div class="row" >
					<div class="col-12" >
						<!-- Checkout Form s-->
						<div class="checkout-form" >
                            <form action="PHP/checkoutDBH.php" method="POST" >
							<div class="row row-40">
							
								<div class="">
									<!-- Billing Address -->
									<div id="billing-form" class="mb-40" style="margin-top: 5%;">
										
										<div class="row">
											
											<div class="col-12 col-12 mb--20">
                                                <label>Product Name*</label>
												<input type="text" placeholder="Product Name" name="product">
											</div>
											<div class="col-md-6 col-12 mb--20">
                                                <label>Product Size</label>
												<select class="nice-select" name="size">
													<option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">Xl</option>
												</select>
												
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Product img address*</label>
												<input type="text" placeholder="MEDIA/img.jpg" name="img">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Product Type*</label>
												<input type="text" placeholder="Product Type" name="type">
												
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Fabric*</label>
												<input type="text" placeholder="Fabric" name="fabric">
											</div>
											<div class="col-md-6 col-12 mb--20">
												<label>Price*</label>
												<input type="text" placeholder="Price" name="price">
											</div>
											<div class="col-md-6 col-12 mb--20">
                                                <label>Gender</label>
                                                <select class="nice-select" name="size">
													<option value="women">Women</option>
                                                    <option value="men">Men</option>
    
												</select>
											</div>
                                            <div class="col-md-6 col-12 mb--20">
                                            <form action="/action_page.php">
                                                <input type="file" id="myFile" name="filename">
                                            </form>
											</div>
											
										</div>
									</div>
									<!-- Shipping Address -->
									
									
								</div>
							</div>
						</div>
                        </form>
					</div>
				</div>
			</div>
		</main>
    </div>
</body>
</html>