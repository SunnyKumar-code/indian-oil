<?php
session_start();
include("db/iocldb.php");

// Check if the user is logged in or redirect to the login page if not
if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
    <h2>Upload Excel File</h2>
    <form action="upload_file.php" method="post" enctype="multipart/form-data">
        <label for="file">Select Excel File:</label>
        <input type="file" name="import_file" id="file" accept=".xls, .xlsx, .csv" required>
        <input type="submit" name="save_excel_data" value ="IMPORT">
    </form>
</body>
</html>
