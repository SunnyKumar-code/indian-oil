<?php
session_start();
include("../db/iocldb.php");

// Check if the user is logged in
if (!isset($_SESSION['employeeid'])) {
  // Redirect to the login page if not logged in
  header("Location: login.php");
  exit();
}

// Get the passed employeeid from the URL
$employeeid = $_GET['employeeid'];

// Fetch user data based on the employeeid
$query = "SELECT * FROM ragister WHERE employeeid = '$employeeid'";
$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);
$loc = $row['location'];

// Get data from the form
$exam_link = $_POST['exam_link'];
$loce = $_POST['loc'];

// Check if the location already exists in the database
$checkQuery = "SELECT * FROM exam WHERE location = '$loce'";
$checkResult = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($checkResult) > 0) {
    // Location already exists, update the record
    $updateSql = "UPDATE exam SET exam_link = '$exam_link' WHERE location = '$loce'";

    if ($conn->query($updateSql) === TRUE) {
        echo "Exam link updated successfully.";
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    // Location does not exist, insert a new record
    $insertSql = "INSERT INTO exam (exam_link, location) VALUES ('$exam_link', '$loce')";

    if ($conn->query($insertSql) === TRUE) {
        echo "Exam link stored successfully.";
    } else {
        echo "Error inserting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
