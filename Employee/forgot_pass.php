<?php
session_start();
error_reporting(E_ALL);
include('../db/iocldb.php');

if (isset($_POST['submit'])) {
    $emp_id = $_POST['Employee_id'];
    $Dob = $_POST['dob'];
    $newpassword = $_POST['newpassword'];  // Don't hash it here, we will do it later

    // Validate input
    if (empty($emp_id) || empty($Dob) || empty($newpassword)) {
        echo "All fields are required.";
    } else {
        // Check if the vendor code and date of birth match in the database
        $sql = "SELECT  employeeid  FROM ragister WHERE employeeid  = '$emp_id' AND dob = '$Dob'";
        $query = mysqli_query($conn, $sql);

        if (mysqli_num_rows($query) > 0) {
            // Vendor code and date of birth match in the database

            // Update the password
            $updateSql = "UPDATE ragister SET Password = '$newpassword' WHERE employeeid = '$emp_id' AND dob = '$Dob'";
            $chngpwd1 = mysqli_query($conn, $updateSql);

            if ($chngpwd1) {
                echo "<script>alert('Your Password successfully changed');</script>";
            } else {
                echo "<script>alert('Password update failed: " . mysqli_error($conn) . "');</script>";
            }
        } else {
            echo "<script>alert('Employee id or Dob is invalid');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("../IMAGE/forgot-password.jpg");
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(5px);
        }

        h2 {
            text-align: center;
        }

        h4 {
            text-align: center;
        }

        #chngpwd {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .auth-link {
            text-decoration: none;
            color: #007BFF;
        }

        .auth-link:hover {
            text-decoration: underline;
        }
       
    </style>

    <script>
        function valid() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("New Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }
    </script>
</head> 

<body>
    <div style="text-align: center;">
        <h2 style="color: orange; display: inline;text-shadow: 2px 2px 8px #0400ff;">RECOVER</h2> <h2 style="color: rgb(3, 3, 190); display: inline;text-shadow: 2px 2px 8px #f4f2f0;">PASSWORD</h2>
      </div>    
      <h4 style="color: #fff;text-shadow: 5px 5px 8px #FF0000;">Enter your vendor code and date of birth to reset the password:</h4>
    <form id="chngpwd" method="post" name="chngpwd" onsubmit="return valid();">
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" placeholder="Employee id" required="true" name="Employee_id">
        </div>
        <div class="form-group">
            <input type="date" class="form-control form-control-lg" name="dob" placeholder="Date of Birth" required="true" />
        </div>
        <div class="form-group">
            <input class="form-control form-control-lg" type="password" name="newpassword" placeholder="New Password" required="true" />
        </div>
        <div class="form-group">
            <input class="form-control form-control-lg" type="password" name="confirmpassword" placeholder="Confirm Password" required="true" />
        </div>
        <div class="mt-3">
            <button class="btn btn-success btn-block loginbtn" name="submit" type="submit">Reset</button>
        </div><br>
        <div class="mt-3">
        <a href="login.php" ><button class="btn btn-success btn-block loginbtn">Sign In</button></a>
        </div>
    </form>
</body>

</html>