<?php
session_start();

// Check if the user is logged in as an apprentice
if (isset($_SESSION['vendor_code'])) {
  // Store the redirect URL in a session variable
  $_SESSION['redirect_url'] = 'apprenticepage.php?vendor_code=' . $_SESSION['vendor_code'];

  // Unset all of the session variables for the apprentice
  $_SESSION = array();

  // Destroy the session for the apprentice
  session_destroy();
}

// Redirect to the login page (indian oil.php) or any other appropriate page
header("Location: ../login.php"); // You can change the destination as needed
exit();
?>
