<?php
session_start();
include("db/iocldb.php");

// Check if the user is logged in or redirect to the login page if not
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
    exit();
}


$success = false; // Initialize the success flag

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated admin details from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $admin_id = mysqli_real_escape_string($conn, $_POST['admin_id']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Validate and sanitize inputs
    // ...

    // Update the admin details in the database
    $query = "UPDATE Admin SET 
        name = '$name',
        admin_id = '$admin_id',
        username = '$username',
        password = '$password',
        email = '$email'
        WHERE username = '$username'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Set the success flag if the update is successful
        $success = true;
    } else {
        // Handle the case where the update query fails
        echo "Error updating admin details: " . mysqli_error($conn);
    }
}

// Fetch admin details based on the admin_id from the URL
if (isset($_GET['username'])) {
    $username = mysqli_real_escape_string($conn, $_GET['username']);

    // Fetch admin details based on the admin_id
    $query = "SELECT * FROM admin WHERE username = '$username'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        // Admin not found, handle this case accordingly (e.g., show an error message)
        echo "Admin not found.";
    }
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="styles.css">
    <title>Edit Admin Details</title>
    <style>
        body {
            background-image: url("../IMAGE/background.jpg");
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(5px);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #success-message {
            display: <?php echo $success ? 'block' : 'none'; ?>;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
<nav>
        <a href="admin.php"><i class="fas fa-home"></i></a>
        <a href="admindata.php?username=<?php echo $_SESSION['username']; ?>"><i class="fas fa-chart-bar"></i></a>
        <a href="adminedit.php?username=<?php echo $_SESSION['username']; ?>"><i class="fas fa-cog"></i></a>
        <a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i></a>
    </nav>
    <!-- Your HTML form for updating admin details goes here -->
    <?php
    // Display a form to edit admin details if admin found
    if (isset($row)) {
    ?>
        <h1>Edit Admin</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <input type="hidden" name="admin_id" value="<?php echo $row['admin_id']; ?>">
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>">
            </div>
            <!-- Admin Id should not be editable -->
            <div>
                <label for="admin_id">Admin Id:</label>
                <input type="text" id="admin_id" name="admin_id" value="<?php echo $row['admin_id']; ?>" >
            </div>
            <div>
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $row['username']; ?>" readonly>
            </div>
            <div style="position: relative;">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>">
                <span id="showPassword" style="position: absolute; top: 35px; right: 25px; cursor: pointer;">👁️</span>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
            </div>
            <div>
                <input type="submit" value="Save">
            </div>
        </form>
        <?php
    } else {
        // Admin not found, show an error message or redirect
        // echo "Admin not found. ";
        if (isset($_GET['username'])) {
            echo "Requested username: " . $_GET['username'];
        }
    }
?>

<?php if ($success) : ?>
    <div id="success-message">DATA UPDATE SUCCESSFUL!!</div>
    <!-- Display the updated admin details -->
    
<?php endif; ?>


</body>
<!-- Include this script in the head of your HTML -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const showPasswordIcon = document.getElementById('showPassword');

        showPasswordIcon.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    });
</script>

</html>
