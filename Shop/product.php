<?php
error_reporting(E_ALL); 
ini_set('display_errors', 1);
require '../PHP/dbh.php';

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
    $res3 = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
    while ($row3  = mysqli_fetch_array($res3)) {
        $id = $row3['Id'];
        $img = $row3['img_index'];
        $name = $row3['Name'];
        if ($radio === "20") {
            $price = $row3["price_20"];
            $no = "20";
        } else if($radio === "30") {
            $price = $row3["price_30"];
            $no = "30";
        } else{
            $price = $row3["price_50"];
            $no = "50";
        }
        $qty = "1";
        $total = $price * $qty;
    }

    if (is_array($_COOKIE['item'])) { //for checking if cookie is avaliable
        foreach ($_COOKIE['item'] as $name1 => $value) {
            $value11 = explode("__", $value);
            $found = 0;
            if ($img1 == $value11[0]) {
                $found = $found + 1;
                $qty = $value11[3] + 1;
                $total = $value11[2] * $qty;
                setcookie("item[$name1]", $img . "__" . $name . "__" . $price . "__" . $qty . "__" . $no . "__" . $total . "__" . $id, time() + 1800);
            }
        }
        if ($found === 0) {
            setcookie("item[$d]", $img . "__" . $name . "__" . $price . "__" . $qty . "__" . $no . "__" . $total . "__" . $id, time() + 1800);
        }
    } else {
        setcookie("item[$d]", $img . "__" . $name . "__" . $price . "__" . $qty . "__" . $no . "__" . $total . "__" . $id, time() + 1800);
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
    <link rel="stylesheet" href="../CSS/menu.css">
    <link rel="stylesheet" href="../CSS/shop.css">
    <link rel="stylesheet" href="../CSS/product.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" type="text/css" MEDIA="screen" href="../CSS/plugins.css" />
	<link rel="stylesheet" type="text/css" MEDIA="screen" href="../CSS/main.css" />

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
        <h2>Veg Steamed Momos</h2>
        <span>Home >> Our Momos >> Product</span>
    </div>
    <form name="" method="POST">
    <div class="main-wrap">
   
    <?php
      $result = mysqli_query($conn, "SELECT * FROM `products` where id = $id; ");
      while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
    ?>
        <div class="img">
            <img src="<?php echo $row['img_index'] ?>" alt="">
        </div>
        <div class="text">
            <span class="momo-name" value="name" ><?php echo $row['Name'] ?></span>
            <span class="momo-price" id="price">&#8377; <?php echo  $row['price_20'] ?> </span>
            <span class="momo-warning"><span class="dot"></span> <?php echo $row['Desc_1'] ?></span>
            <span class="momo-warning"><span class="dot"></span> <?php echo $row['Desc_2'] ?></span>
            <span class="momo-quantity">Quantity <select id="Quantity" name="radio" onchange="changeFunc(this.value);">
                <option value="20" selected>20 pieces</option>
                <option value="30" >30 pieces</option>
                <option value="50" >50 pieces</option>
              </select></span>
            <div class="info">
                <div class="left">
                    <span>Category:</span>
                    <span>Tags:</span>
                </div>
                <div class="right">
                    <span> <?php echo $row['Category'] ?></span>
                    <span> <?php echo $row['Tags'] ?></span>
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
    <script>
       
        <?php
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($result)) {
        ?>
            function changeFunc(value){
                var price = document.getElementById("price");
                if(value==="20"){
                    price.innerHTML =  "&#8377; <?php echo  $row['price_20'] ?>";
                }
                else if(value==="30"){
                    price.innerHTML = "&#8377; <?php echo  $row['price_30'] ?>";
                }
                else if(value==="50"){
                    price.innerHTML = "&#8377; <?php echo  $row['price_50'] ?>";
                }
                else{
                    price.innerHTML = "&#8377; <?php echo  $row['price_20'] ?>";
                }
            }

           

        <?php
        }

        ?>
    </script>
</body>
</html>