<?php include("../db/iocldb.php"); ?>
<?php
// Check if the 'location' parameter is present in the URL
if (isset($_GET['location'])) {
    // Retrieve the location from the URL parameter
    $location = $_GET['location'];
} else {
    // Set a default location or handle the absence of the parameter as needed
    $location = '';
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration Page</title>
  <style>
    body {
      background-image: url("../IMAGE/background.jpg");
      background-size: cover;
      background-position: center;
      backdrop-filter: blur(5px);
    }
    select{
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 40px 80px;
      background-color: whitesmoke;
      border-radius: 20px;
      box-shadow: 0 5px 12px rgba(0, 0, 0, 0.1);
    }
    
    h1 {
      font-size: 40px;
      color: black;
      text-align: center;
    }
    
    .form-group {
      margin-bottom: 20px;
    }
    
    .form-group label {
      display: block;
      font-size: 20px;
      font-weight: bold;
      margin-bottom: 5px;
      color: black;
    }
    
    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group input[type="date"],
    .form-group input[type="email"],
    .form-group input[type="password"] {
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }
    
    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
      padding: 8px 16px;
      border: none;
      border-radius: 3px;
    }
    
    .form-group input[type="submit"]:hover {
      background-color: orange;
    }
    .password-strength {
      margin-top: 5px;
      font-size: 12px;
      color: #888;
    }
    
    .password-strength strong {
      color: #ff4d4d;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Apprentice</h1>
    <form action="#" method="POST">
      <div class="form-group">
        <label for="registration-no">Registration No:</label>
        <input type="text" id="registration-no" name="registration_no" required>
      </div>
      <div class="form-group">
        <label for="vendor-code">Vendor Code:</label>
        <input type="text" id="vendor-code" name="vendor_code" required>
      </div>
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
      </div>
      <div class="form-group">
        <label for="discipline">Discipline:</label>
        <select id="discipline" name="discipline" value="Enter Discipline" required>
                        <option value="Trade">Trade</option>
                        <option value="Graduate">Graduate</option>
                        <option value="Data Entry">Data Entry</option>
                        <option value="Retail Sales">Retail Sales</option>
                        <option value="Technician">Technician</option>
                    </select>
      </div>
      <div class="form-group">
        <label for="nats-naps-id">NATS/NAPS Enrollment ID:</label>
        <input type="text" id="nats-naps-id" name="nats_naps_id" required>
      </div>
      <div class="form-group">
        <label for="contract-no">Contract No:</label>
        <input type="text" id="contract-no" name="contract_no" required>
      </div>
      <div class="form-group">
        <label for="state">State:</label>
        <input type="text" id="state" name="state" required>
      </div>
      <div class="form-group">
        <label for="state-office">State Office:</label>
        <input type="text" id="state-office" name="state_office" required>
      </div>

      <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" value="<?php echo $location; ?>" id="location" name="location" required readonly>
        </div>

      
      <div class="form-group">
        <label for="mobile-no">Mobile No:</label>
        <input type="text" id="mobile-no" name="mobile_no" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="join">Date of Joining:</label>
        <input type="date" id="dob" name="join" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <div class="password-strength" id="password-strength"></div>
      </div>
 
      <div class="form-group">
        <input type="submit" name="submit" value="Register">
      </div>
    </form>
  </div>
  <script>
    var passwordInput = document.getElementById('password');
    var passwordStrength = document.getElementById('password-strength');
    
    passwordInput.addEventListener('input', function() {
      var password = passwordInput.value;
      var strength = checkPasswordStrength(password);
      var color = getPasswordStrengthColor(strength);
      passwordStrength.innerHTML = 'Password Strength: <strong style="color: ' + color + ';">' + strength + '</strong>';
    });
    
    function checkPasswordStrength(password) {
      // Password strength criteria
      var criteria = {
        length: password.length >= 8,
        uppercase: /[A-Z]/.test(password),
        lowercase: /[a-z]/.test(password),
        number: /[0-9]/.test(password),
        special: /[!@#$%^&*()\-_=+{};:,<.>]/.test(password)
      };
      
      var strength = 'Weak';
      
      if (criteria.length && criteria.uppercase && criteria.lowercase && criteria.number && criteria.special) {
        strength = 'Strong';
      } else if (criteria.length && criteria.lowercase && (criteria.uppercase || criteria.number || criteria.special)) {
        strength = 'Moderate';
      }
      
      return strength;
    }
    
    function getPasswordStrengthColor(strength) {
      switch (strength) {
        case 'Weak':
          return '#ff4d4d'; // Red color for Weak
        case 'Moderate':
          return '#ffd633'; // Yellow color for Moderate
        case 'Strong':
          return '#4CAF50'; // Green color for Strong
        default:
          return '#888'; // Default color
      }
    }
    </script>
</body>
</html>
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
if(isset($_POST['submit']))
{
  // Your database connection code goes here (initialize $conn)

  $registration_no = $_POST['registration_no'];
  $vendor_code = $_POST['vendor_code'];
  $name = $_POST['name'];
  $dob = $_POST['dob'];
  $discipline = $_POST['discipline'];
  $nats_naps_id = $_POST['nats_naps_id'];
  $contract_no = $_POST['contract_no'];
  $state = $_POST['state'];
  $state_office = $_POST['state_office'];
  $location = $_POST['location'];
  $mobile_no = $_POST['mobile_no'];
  $email = $_POST['email'];
  $join = $_POST['join'];
  $password = $_POST['password'];


   // Use prepared statements or other methods to secure your SQL query

   $query = "INSERT INTO `apprentice` (Registration,vendor_code,Name,dob,Status, Discipline,Enrollment_ID,Contact_No,State,State_Office,Location,Mobile_No,Email,Date_Of_Joining,Password) 
   VALUES ('$registration_no', '$vendor_code', '$name', '$dob', 'Active','$discipline', '$nats_naps_id','$contract_no','$state','$state_office','$location','$mobile_no','$email','$join','$password')";
   $data = mysqli_query($conn, $query);
   if($data) {
    echo '<script> alert("REGISTRATION SUCCESSFUL!!") </script>';
   } else {
       echo "Error: " . mysqli_error($conn);
   }
  }
  ?>