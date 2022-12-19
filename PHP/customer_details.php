
<?php

    require 'dbh.php';


        $order_id=$_GET['order_id'];
        
        $sql = "SELECT customer_id FROM orders WHERE order_id=$order_id";
        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            $n=mysqli_affected_rows($conn);
                    if($n==1)
                    {
                        if($rows=mysqli_fetch_assoc($res))
                        {
                                  $customer_id=$rows['customer_id'];
                        }
                    }
        }

        $sql = "SELECT customer_id FROM customer WHERE customer_id=$customer_id";
        $res = mysqli_query($conn,$sql);
        if($res==true)
        {
            $n=mysqli_affected_rows($conn);
                    if($n==1)
                    {
                        if($rows=mysqli_fetch_assoc($res))
                        {
                                  $cutomer_fname=$rows['first_name'];
                                  $customer_email=$rows['email'];
                                  $customer_lname=$rows['last_name'];
                                  $customer_mobile=$rows['mobile_number'];
                                  $customer_address1=$rows['address_1'];
                                  $customer_city1=$rows['city_1'];
                                  $customer_pincode1=$rows['pincode_1'];
                        }
                    }
        }
        
        

        $sql = "SELECT product_id FROM orders WHERE order_id=$order_id";
        $res = mysqli_query($conn,$sql);

        if($res==true)
        {
            $n=mysqli_affected_rows($conn);
                    if($n==1)
                    {
                        if($rows=mysqli_fetch_assoc($res))
                        {
                            $product_id=$rows['product_id'];
                        }
                    }
        }


        $sql = "SELECT product_id FROM products WHERE product_id=$product_id";
        $res = mysqli_query($conn,$sql);
        if($res==true)
        {
            $n=mysqli_affected_rows($conn);
                    if($n==1)
                    {
                        if($rows=mysqli_fetch_assoc($res))
                        {
                                  $product_name=$rows['name'];
                                  $img=$rows['img'];
                                  $type=$rows['type'];
                                  $fabric=$rows['fabric'];
                                  $price=$rows['price'];
                                  $gender=$rows['gender'];
                                 
                        }
                    }
        }
        
       

