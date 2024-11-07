<?php include("db/iocldb.php");
session_start(); ?>
<!DOCTYPE html>
<html>

<head>
  <title>Login Page</title>
  <link rel="stylesheet" type="text/css" href="logincss.css">
</head>

</head>

<body>
  <div class="container">


    <div class="left-side"></div>
    <div class="login-box">
      <a href="indian oil.php">
        <h2><img src="IMAGE/logo.gif"></h2>
      </a>
      <h2>Apprentice Login</h2>
      <form action="#" method="POST">
        <div class="form-group">
          <label for="username1">Vendor Code:</label>
          <input type="text" id="username1" name="vendor_code" required>
        </div>
        <div class="form-group">
          <label for="password1">Password:</label>
          <input type="password" id="password1" name="password" required>
        </div>
        <div class="form-group">
          <a href="Apprentice/forgot_password.php">Forgot Password?</a>
        </div>
        <div class="form-group">
          <input type="submit" value="Login" name="login1">

        </div>
        <div class="form-group">
          <p id="loginMessage1"></p>
        </div>
      </form>

      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);

      if (isset($_POST['login1'])) {

        $vendor_code = $_POST['vendor_code'];
        $password1 = $_POST['password'];
      



        // Check if the employeeid and hashed password match in the 'ragister' table
        $query = "SELECT * FROM apprentice WHERE vendor_code = '$vendor_code' AND Password = '$password1'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
          echo $vendor_code;
          $_SESSION['vendor_code'] = $vendor_code;
          header("Location: Apprentice\apprentice.php?vendor_code=$vendor_code");
        } else {  // Authentication failed

          echo '<script>';
          echo 'alert("Invalid Employee ID or Password")';
          echo '</script>';
        }
      }


      ?>

    </div>
    <div class="vertical-line"></div>
    <div class="right-side"></div>
    <div class="login-box">
      <a href="indian oil.php">
        <h2><img src="IMAGE/logo.gif"></h2>
      </a>

      <h2>Officer Login</h2>
      <?php
      if (isset($_SESSION['status'])) {
      ?>
        <div>
          <h5><?= $_SESSION['status']; ?></h5>
        </div>
      <?php
        unset($_SESSION['status']);
      }
      ?>
      <form action="#" method="POST" autocomplete="off">
        <div class="form-group">
          <label for="username2">Employee Id:</label>
          <input type="text" id="username2" name="employeeid" required>
        </div>
        <div class="form-group">
          <label for="password2">Password:</label>
          <input type="password" id="password2" name="password" required>
        </div>
        <div class="form-group">
          <a href="Employee/forgot_pass.php">Forgot Password?</a>
        </div>
        <div class="form-group">
          <input type="submit" value="Login" name="login">
          <input type="Registration" value="Registration" onclick="window.location.href='Employee/Registration.php' ">
        </div>
        <div class="form-group">

          <p id="loginMessage2"></p>
        </div>
      </form>
    </div>
  </div>



  <script src="loginjava.js"></script>
</body>

</html>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


if (isset($_POST['login'])) {

  $employeeid = $_POST['employeeid'];
  $password = $_POST['password'];

  // Check if the employeeid and hashed password match in the 'ragister' table
  $query = "SELECT * FROM ragister WHERE employeeid = '$employeeid' AND password = '$password' AND verify_status ='1'";
  $result = mysqli_query($conn, $query);

  if (mysqli_num_rows($result) == 1) {
    echo $employeeid;
    $_SESSION['employeeid'] = $employeeid;
    header("Location: Employee/mainpage.php?employeeid=$employeeid");
  } else {  // Authentication failed
    echo '<script> alert("Invalid Employee ID or Password") </script>';
  }
}


?>