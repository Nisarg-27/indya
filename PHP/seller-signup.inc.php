<?php
if(isset($_POST['signup'])){
    require 'dbh.php';

    $company = $_POST['company'];
    $mobile = $_POST['mobile'];
    $gst = $_POST['gst'];
    $location = $_POST['location'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['password_1'];



    if(empty($first_name) || empty($last_name) || empty($email) || empty($pwd) || empty($company) ){
        header("Location: ../seller-signup.php?error=emptyfield&fname=".$first_name."&lname=".$last_name."&email=".$email."&company=".$company."&mobile=".$mobile."&gst=".$gst);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../seller-signup.php?error=invalidmail&fname=".$first_name."&lname=".$last_name);
        exit();
    }

    else{
        $sql = "SELECT email FROM sellers WHERE email=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../seller-signup.php?error=sqlwrrow");
            exit();
        }
        else{
            mysqli_stmt_bind_param($stmt,"s",$email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);
            if($resultCheck > 0){
                header("Location: ../seller-signup.php?error=usertaken");
                exit();
            }
            else{
                $sql = "INSERT INTO sellers (company, seller_fname, seller_lname, email, mobile, location, GSTN, password) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../seller-signup.php?error=sqlerrow". mysqli_error($conn));
                    exit();
                }
                else{
                    $hashedpwd = password_hash($pwd, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt,"ssssssss", $company, $first_name, $last_name, $email, $mobile, $location, $gst, $hashedpwd);
                    mysqli_stmt_execute($stmt);
                    
                    header("Location: ../seller-login.php?signup=success");
                    exit();
                   
                    $to = $email;
                    $subject = 'Welcome to Indya';
                    $message_body = '
                    Hello '.$first_name.',

                    Thakn you for singing up!
                    Hope you buy a lot of books and make me rich ;)
                    
                    ';
                    mail($to, $subject, $message_body);
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else{
    header("Location: ../seller-signup.php");
    exit();
}