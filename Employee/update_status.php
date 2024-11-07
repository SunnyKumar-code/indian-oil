<?php
session_start();
include("../db/iocldb.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $vendorCode = $_POST['vendor_code'];
  $newStatus = $_POST['status'];

  // Update status in the database
  $query = "UPDATE apprentice SET Status = '$newStatus' WHERE vendor_code = '$vendorCode'";
  $result = mysqli_query($conn, $query);

  if ($result) {
    echo "<script> alert('status updated successfully')</script>";
  } else {
    echo "Error updating status: " . mysqli_error($conn);
  }
}
?>
