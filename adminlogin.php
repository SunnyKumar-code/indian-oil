
<?php include("db/iocldb.php");
session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="adminlogin.css">
</head>
<body>
    <div class="login-container">
        <h1>Admin Login</h1>
        <form id="login-form" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit" name="submit">Login</button>
        </form>
    </div>

    <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);

      if (isset($_POST['submit'])) {

        $username = $_POST['username'];
        $password = $_POST['password'];
      



        // Check if the employeeid and hashed password match in the 'ragister' table
        $query = "SELECT * FROM Admin WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
          
          $_SESSION['username'] = $username;
          header("Location: admin.php?username=$username");
        } else {  // Authentication failed

          echo '<script>';
          echo 'alert("Invalid Username or Password")';
          echo '</script>';
        }
      }


      ?>
</body>
</html>
