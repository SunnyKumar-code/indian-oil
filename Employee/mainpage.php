<?php
session_start();
include("../db/iocldb.php");
// Start or resume the session
session_start();

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
?>
<!DOCTYPE html>

<html>

<head>
  <title>Profile Page</title>
  <link rel="stylesheet" type="text/css" href="mainpage.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>

<body>
  <div class="navbar">
    <a href="addApprentice.php?location=<?php echo $row['location']; ?>">Add Apprentice</a>
    <a href="download_attendance.php">Attendance File</a>


    <a href="exam_index.php?employeeid=<?php echo $row['employeeid']; ?>">Exam Form</a>
   
       <a href="upload_result.php?employeeid=<?php echo $row['employeeid']; ?>"> UPLOAD RESULT</a>
      



    
    <div>
      <a href="logout.php">Logout</a>
    </div>
  </div>


  <?php
  // Display user information
  echo '<table  class="no-border">';
  echo '<tr>';
  echo '<td>';
  echo '<div class="profile-img">';
  echo '<img src="' . $row['folder'] . '" alt="Profile Photo" width="80" height="80">';
  echo '</div>';
  echo '</td>';
  echo '<td>';
  echo '<div class="name-email">';
  echo '<div class="name">' . $row['fullname'] . '<br></div>';
  echo '<div class="email">' . $row['email'] . '</div>';
  echo '</div>';
  echo '</td>';
  echo '<td>';
  echo '<div class="location">' . $row['location'] . '</div>';
  echo '</td>';
  echo '</tr>';
  echo '</table>';

  // Display the table of apprentices
  $loc = $row['location'];
  // SQL query to retrieve data
  $sql = "SELECT * FROM apprentice WHERE Location ='$loc' "; // Change 'apprentice' to your actual table name

  // Execute query
  $result = $conn->query($sql);

  // Check if there are results
  if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>NAME</th>
                <th>ATTENDANCE</th>
                <th>Status</th>
                <th>Edit</th>
            </tr>";

    // Fetch data and display in a table
    while ($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["Name"] . "<br>";
      echo "<a href='apprenticepage.php?vendor_code=" . $row['vendor_code'] . "'>View Details</a>";
      echo "</td>";
      echo "<td>";
      echo "<a href='attendance.php?vendor_code=" . $row['vendor_code'] . "'>Mark Attendance</a>";
      echo "</td>";
      echo "<td>";
      echo "<button class='status' id='statusToggle' data-vendor-code='" . $row['vendor_code'] . "'>" . $row['Status'] . "</button>";
      echo "</td>";
      echo "<td>";
      echo "<a href='update_apprentice.php?vendor_code=" . $row['vendor_code'] . " 'class='edit-button'>Edit</a>";
      echo "</td>";
      echo "</tr>";
    }

    echo "</table>";
  } else {
    echo "No records found";
  }
  ?>

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- jQuery UI -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="mainpage.js"></script>
</body>

</html>