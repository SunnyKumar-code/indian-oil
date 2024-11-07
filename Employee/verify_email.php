<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include("../db/iocldb.php");
if(isset($_GET['token'])){
    $token = $_GET['token'];
    echo $token;
    $verify_query = "SELECT verify_token, verify_status FROM ragister WHERE verify_token='$token' ";
    $verify_query_run = mysqli_query($conn, $verify_query);
    
    if($verify_query_run){
        echo 'inside if';
        $row = mysqli_fetch_assoc($verify_query_run);
        print_r($row);
        echo $row['verify_status'];

        if($row['verify_status'] == '0'){
            $tok = $row['verify_token'];
            $update_query= "UPDATE ragister SET verify_status = '1' WHERE verify_token='$tok'LIMIT 1";
            $update_query_run = mysqli_query($conn, $update_query);
            if($update_query_run){
                $_SESSION['status'] = 'YOUR ACCOUNT HAS BEEN VERIFIED SUCCESSFULLY!';
                echo '<script> alert("YOUR ACCOUNT HAS BEEN VERIFIED SUCCESSFULLY!") </script>';
                header ("Location: ../login.php");
                exit(0);
            }else{
                $_SESSION['status'] = 'VERIFICATION FAILED! TRY AGAIN!';
                echo '<script> alert("VERIFICATION FAILED! TRY AGAIN!") </script>';
                header ("Location: Registration.php");
                exit(0);
            }

        }else{
            $_SESSION['status'] = 'YOUR ACCOUNT IS ALREADY VERIFIED!';
            echo '<script> alert("YOUR ACCOUNT IS ALREADY VERIFIED!!") </script>';
            header ("Location: ../login.php");
            exit(0);
        }
    }
    else{
        echo 'not working';
        $_SESSION['status'] = 'THE TOKEN DOES NOT EXIST! TRY AGAIN!';
        echo '<script> alert("THE TOKEN DOES NOT EXIST! TRY AGAIN!';
        header ("Location: Registration.php");
    }
}else{
    $_SESSION['status'] = 'NOT ALLOWED TO VERIFY!';
   
    echo '<script> alert("NOT ALLOWED TO VERIFY!") </script>';
    header ("Location: Registration.php");
}
?>