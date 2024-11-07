<?php
session_start();
include("../db/iocldb.php");

// Check if the user is logged in or redirect to the login page if not
if (!isset($_SESSION['employeeid'])) {
    header("Location: ../login.php"); // Adjust the login page URL as needed
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Exam Links</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('../IMAGE/exam1.jpg');
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(5px);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: rgb(253, 165, 0);
            /* Adjust the blur level as needed */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            width: 400px;
            color: #fff;
            /* Adjust text color for better readability */
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0;
        }

        input[type="text"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #1d09f2;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0b16a7;
        }
    </style>
</head>

<body>
    <?php
    // Check if the user is logged in or redirect to the login page if not


    // Check if vendor_code is provided in the URL
    if (isset($_GET['employeeid'])) {
        $employeeid = $_GET['employeeid'];

        // Fetch apprentice details based on the vendor_code
        $query = "SELECT * FROM ragister WHERE employeeid = '$employeeid'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    }

    ?>
    <div class="container">
        <h1>Store Exam Links</h1>
        <form action="store_link.php" method="post">
            <label for="exam_link">Exam Link:</label>
            <input type="text" name="exam_link" required><br>
            <input type="hidden" name="loc" value="<?php echo $row['location']; ?>">


            <input type="submit" value="Submit">
        </form>
    </div>
</body>

</html>