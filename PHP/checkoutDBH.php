<?php
error_reporting(E_ALL); 
require 'dbh.php';
session_start();
if (isset($_POST['submit'])) {
    $total = $_SESSION['total'];
    $_SESSION['cart-total'] = $total;
    $products = $_SESSION['id'];
    $product_sr = implode(",", $products);
    $product_size = $_SESSION["no"];
    $product_size_sr = implode(",", $product_size);
   
    $sql = "INSERT INTO temp_order(products,products_size,grand_total) VALUES('$product_sr','$product_size_sr',$total);";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['lastid'] = mysqli_insert_id($conn);
        header('Location: ../checkout.php');
       
    } else {
        header('Location: ../cart.php?error' . mysqli_error($conn));
    } 
}

if (isset($_POST['checkout'])) {
    $first_name = $_POST['first_name'] ;
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address_1 = $_POST['address_1'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $id =  $_SESSION['lastid'];
    $sql = "UPDATE temp_order SET first_name = '$first_name', last_name = '$last_name', email = '$email', mobile = '$phone', address_1 = '$address_1', city = '$city', pincode = '$pincode' , country = '$country' WHERE order_id = $id ;";
    echo $last_name;
    echo $first_name;
    echo $id;
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['lastid'] = mysqli_insert_id($conn);
        header('Location: ../index.php');
 
    } else {
        header('Location: ../checkout.php?error' . mysqli_error($conn));
    }
}


if (isset($_POST['submit2'])) {
    $total = $_SESSION['total'];
    $customer_id = $_SESSION['customer_id'];
    $_SESSION['cart-total'] = $total;
    $products = $_SESSION['id'];
    $product_sr = implode(",", $products);
    $product_size = $_SESSION["no"];
    $product_size_sr = implode(",", $product_size);
   
    $sql = "INSERT INTO orders(products,products_size,grand_total,customer_id) VALUES('$product_sr','$product_size_sr',$total,$customer_id);";
    $query = mysqli_query($conn, $sql);
    if ($query) {   
        $_SESSION['lastid'] = mysqli_insert_id($conn);
        header('Location: ../checkout.php');
       
    } else {
        header('Location: ../cart.php?error' . mysqli_error($conn) . $customer_id);
    } 
}

if (isset($_POST['checkout2'])) {
    $first_name = $_POST['first_name'] ;
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address_1 = $_POST['address_1'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pincode = $_POST['pincode'];
    $id =  $_SESSION['lastid'];
    $customer_id = $_SESSION['customer_id'];
    $sql = "UPDATE customer SET mobile_number = '$phone', address_1 = '$address_1', city_1 = '$city', pincode_1 = '$pincode'  WHERE customer_id = $customer_id ;";
    $query = mysqli_query($conn, $sql);
    if ($query) {
        $_SESSION['lastid'] = mysqli_insert_id($conn);
        header('Location: ../index.php');
 
    } else {
        header('Location: ../checkout.php?error' . mysqli_error($conn));
    }
}