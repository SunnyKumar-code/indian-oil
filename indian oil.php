<?php
session_start();

// Check if the user is logged in as an apprentice
if (isset($_SESSION['vendor_code'])) {
  // Construct the URL to the apprentice's detail page
  $apprenticeDetailURL = 'apprenticepage.php?vendor_code=' . $_SESSION['vendor_code'];

  // Redirect to the apprentice's detail page
  header("Location: " . $apprenticeDetailURL);
  exit();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>IOCL ALL LOCATION</title>
  <link rel="stylesheet" type="text/css" href="button.css">
</head>
<body>
  <div class="container">
  <a href= " indian oil.php"><img src="IMAGE/logo.gif" alt="Indian Oil Logo" ></a>
    <h2>ALL LOCATION<br></h2>
    <!-- nro -->
    <button onclick="showNro()" class="blue">NRO</button>
    <div id="nroContainer"></div>
    <!-- dso -->
    <button onclick="showDso()" class="orange">DSO</button>
    <div id="dsoContainer"></div>
    <!-- pso -->
    <button onclick="showPso()" class="blue">PSO</button>
    <div id="psoContainer"></div>
    <!-- RSO -->
    <button onclick="showRso()" class="orange">RSO</button>
    <div id="rsoContainer"></div>
    <!-- UPSO1 -->
    <button onclick="showUpso1()" class="blue">UPSO I</button>
    <div id="upso1Container"></div>
    <!-- UPSO2 -->
    <button onclick="showUpso2()" class="orange">UPSOII</button>
    <div id="upso2Container"></div>
    <!-- LUBES -->
    <button onclick="showLubes()" class="blue">LUBES</button>
    <div id="lubesContainer"></div>
  </div>
  
  <script src="botton.js"></script>
</body>
</html>
