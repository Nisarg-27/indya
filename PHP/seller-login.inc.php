<?php


if(isset($_POST['login-btn'])){
    require 'dbh.php';

    $mailuid = $_POST['user-name'];
    $password = $_POST['password'];
    
    if(empty($mailuid) || empty($password)){
        header("Location: ../login.php?error=emptyfields");
        exit();
    }
    else{
        $sql = "SELECT * FROM sellers WHERE email='$mailuid'";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: login.php?errow=sqlerror");
            exit();
        }
        else{
           
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if($row = mysqli_fetch_assoc($result)){
                $pwdCheck = password_verify($password, $row['password']);
                
                if($pwdCheck == false){
                    header("Location: ../seller-login.php?errow=wrongpassword");
                    exit();
                }
                else if($pwdCheck == true){
                    session_start();
                    $_SESSION['id'] = $row['customer_id'];
                    $_SESSION['name'] = $row['first_name'];
                    $_SESSION['last-name'] = $row['last_name'];
                    $_SESSION['stream'] = $row['education'];
                    $_SESSION['mobile'] = $row['mobile_number'];
                    $_SESSION['address_1'] = $row['address_1'];
                    $_SESSION['land_mark_1'] = $row['land_mark_1'];
                    $_SESSION['city_1'] = $row['city_1'];
                    $_SESSION['district_1'] = $row['district_1'];
                    $_SESSION['pincode_1'] = $row['pincode_1'];
                    header("Location: ../index.php?login=success");
                    exit();
                }
                else{
                    header("Location: ../user-login.php?errow=wrongpassword");
                    exit();
                }
            }
            else{
                header("Location: ../user-login.php?errow=nouser");
                exit();
            }
        }
    }
}
else{
    header("Location: ../user-login.php?notloggedin");
    exit();
}