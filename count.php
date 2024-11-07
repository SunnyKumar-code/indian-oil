<?php
include("db/iocldb.php");

// Query to count the number of apprentices
$sqlApprentice = "SELECT COUNT(*) as count FROM apprentice";
$resultApprentice = $conn->query($sqlApprentice);

// Query to count the number of employees
$sqlEmployee = "SELECT COUNT(*) as count FROM ragister";
$resultEmployee = $conn->query($sqlEmployee);

// Check for errors
if ($resultApprentice === false || $resultEmployee === false) {
    die("Error executing query: " . $conn->error);
}

// Display the results
if ($resultApprentice->num_rows > 0) {
    $rowApprentice = $resultApprentice->fetch_assoc();
    $recordCountApprentice = $rowApprentice['count'];
   
} else {
    echo "No apprentice records found";
}

if ($resultEmployee->num_rows > 0) {
    $rowEmployee = $resultEmployee->fetch_assoc();
    $recordCountEmployee = $rowEmployee['count'];
    
} else {
    echo "No employee records found";
}

// Close the connection
$conn->close();
?>
