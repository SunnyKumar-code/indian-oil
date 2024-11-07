<?php
session_start();
include("../db/iocldb.php");
$ven_code = $_GET['vendor_code']; 
// Fetch apprentice details based on the vendor_code
$query = "SELECT * FROM apprentice WHERE vendor_code  = '$ven_code'";
$result = mysqli_query($conn, $query);
$apprentice_row = mysqli_fetch_assoc($result);
$loc= $apprentice_row["Location"];

?>

<!DOCTYPE html>
<html>
<head>
  <title>Apprentice Information</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f2f2f2;
    }

    h2 {
      margin-top: 0;
    }

    .button-container {
      margin-bottom: 20px;
    }

    .button-container button {
      padding: 10px 20px;
      margin-right: 10px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .button-container button:hover {
      background-color: #45a049;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
      background-color: white;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    .btn{
      padding: 10px 20px;
      margin-right: 10px;
      font-size: 16px;
      background-color: #4CAF50;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h2>Apprentice Information</h2>
  <?php
// Fetch user data based on the employeeid
$exam_query = "SELECT * FROM exam WHERE location = '$loc'";
$result = mysqli_query($conn, $exam_query);
$exam_row = mysqli_fetch_assoc($result);
?>
  
  <div class="button-container">

    <a href="<?php echo $exam_row['exam_link']?>"><button>Exam</button></a>
    <a href="../viewattendance.php?vendor_code=<?php echo $ven_code?>" ><button>View Attendance</button><a>
    <button onclick="openresult()">Result</button>
    <a href="logout_apprentice.php" class="logout-button"><button>LOG OUT</button></a>
  </div>

<?php
// Fetch user data based on the employeeid
$query = "SELECT * FROM apprentice WHERE Vendor_code = '$ven_code'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
if($row){
  echo"<table>";
    echo"<tr>";
      echo"<th>Registration No:</th>";
      echo'<td>' . $row['Registration'] . '</td>';
    echo"</tr>";
    echo"<tr>";
      echo"<th>Vendor Code:</th>";
      echo"<td>" .$row['vendor_code'] ."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>Name:</th>";
      echo"<td>".$row['Name']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>Date Of Birth:</th>";
      echo"<td>".$row['dob']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>Discipline:</th>";
      echo"<td>".$row['Discipline']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>NATS/NAPS ENROLLMENT ID:</th>";
      echo"<td>".$row['Enrollment_ID']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>Contract NO:</th>";
      echo"<td>".$row['Contact_No']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>State:</th>";
      echo"<td>".$row['State']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>State Office:</th>";
      echo"<td>".$row['State_Office']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>Location:</th>";
      echo"<td>".$row['Location']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>Mobile NO:</th>";
      echo"<td>".$row['Mobile_No']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>Email:</th>";
      echo"<td>".$row['Email']."</td>";
    echo"</tr>";
    echo"<tr>";
      echo"<th>Date OF Joining:</th>";
      echo"<td>".$row['Date_Of_Joining']."</td>";
    echo"</tr>";
  echo"</table>";
}else{
  echo "Apprentice not found.";
}
?>
  <script>
   
    function openresult() {
      // Code to handle opening the attendance page
      console.log("Opening attendance...");
    }
  </script>
</body>
</html>
