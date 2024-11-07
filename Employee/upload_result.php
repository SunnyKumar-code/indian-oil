<?php
session_start();
include("../db/iocldb.php");

// Check if the user is logged in or redirect to the login page if not
if (!isset($_SESSION['employeeid'])) {
    header("Location: ../login.php"); // Adjust the login page URL as needed
    exit();
}

// Check if vendor_code is provided in the URL
if (isset($_POST['submit'])) {
    $filename = $_FILES["result"]["name"];
    $tempname = $_FILES["result"]["tmp_name"];
    $folder = "../result/" . $filename;

    // Validate file type
    $allowed_extensions = array("xls", "xlsx", ".xlsm", "xlsb", "xltx"); // Add more if needed
    $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    if (!in_array($file_extension, $allowed_extensions)) {
        echo "Invalid file type. Allowed types are: " . implode(", ", $allowed_extensions);
        exit;
    }

    // Validate file size (adjust the size limit as needed)
    if ($_FILES["result"]["size"] > 5242880) { // 5 MB
        echo "File size is too large. Maximum allowed size is 5 MB.";
        exit;
    }

    move_uploaded_file($tempname, $folder);

    // Get user's employeeid
    $employeeid = $_SESSION['employeeid'];

    // Use prepared statements to prevent SQL injection
    $query = "UPDATE ragister SET Upload_result = ? WHERE employeeid = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $filename, $employeeid);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Display a success message using JavaScript
        echo '<script>alert("File uploaded successfully!");</script>';
    } else {
        echo "Error updating database: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload result</title>
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
    background-color: rgba(253, 165, 0, 0.7); /* Adjust alpha (last value) for transparency */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 5px;
    width: 400px;
    color: #fff;
    position: relative;
    z-index: 1;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border-radius: 5px;
    width: 400px;
    color: #fff;
}



h1 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    
    margin: 20px 0;
}

input[type="file"] {
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}
.rol{
    font-size: 25px;
}

input[type="submit"] {
        background-color: #0b0648;
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
    <div class="container">
        <h1>UPLOAD RESULT</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="result" class="rol">Upload Only Excel File</label>
            <input type="file" name="result" id="result" required><br>

            <!-- Remove the following line if $row['location'] is not defined -->
            <input type="hidden" name="loc" value="<?php echo isset($row['location']) ? $row['location'] : ''; ?>">

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>