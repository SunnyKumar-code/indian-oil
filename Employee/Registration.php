<?php include("../db/iocldb.php");
session_start();
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

    .container {
      max-width: 400px;
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

    h2 {
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

    .form-group input {
      width: 100%;
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .form-group input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
    }

    .form-group input[type="submit"]:hover {
      background-color: orange;
    }

    .otp-container {
      display: flex;
      align-items: center;
    }

    .otp-container input[type="text"] {
      flex-grow: 1;
      margin-right: 10px;
    }


    .password-strength {
      margin-top: 5px;
      font-size: 12px;
      color: #888;
    }

    .password-strength strong {
      color: #ff4d4d;
    }

    .profile-image-upload {
      margin-bottom: 20px;
    }

    .profile-image-upload label {
      font-size: 20px;
      font-weight: bold;
      margin-right: 10px;
      color: black;
    }

    .profile-image-upload input[type="file"] {
      padding: 8px;
      border-radius: 3px;
      border: 1px solid #ccc;
    }

    .profile-image-upload input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      cursor: pointer;
      padding: 5px 20px;
      border: none;
      border-radius: 3px;
    }

    .profile-image-upload input[type="submit"]:hover {
      background-color: orange;
    }
  </style>
</head>

<body>

  <div class="container">

    <a href="indian oil.php">
      <h2><img src="../IMAGE/logo.gif"></h2>
    </a>

    <h1>Registration</h1>
    <?php
    if (isset($_SESSION['status'])) {
    ?>
      <div>
        <h5><?= $_SESSION['status']; ?></h5>
      </div>
    <?php
      unset($_SESSION['status']);
    }
    ?>

    <form action="#" method="POST" enctype="multipart/form-data">

      <div class="profile-image-upload">
        <label for="profile-image">Profile Image:</label>
        <input type="file" id="profile-image" name="profile">
      </div>
      <div class="form-group">
        <label for="fullname">Full Name:</label>
        <input type="text" id="fullname" name="fullname" required>
      </div>

      <div class="form-group">
        <label for="employeeid">Employee ID:</label>
        <input type="text" id="employeeid" name="employeeid" pattern="[0-9]{8}" title="Please enter an 8-digit number" required>
      </div>
      <div class="form-group">
        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" required>
      </div>

      <div class="form-group">
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="form-group">
        <label for="location">Location:</label>
        <select id="location" name="location" required>
          <option value="Northern Regional Office (NRO)">Northern Regional Office (NRO)</option>
          <option value="Adampur AFS">Adampur AFS</option>
          <option value="Allahabad AFS">Allahabad AFS</option>
          <option value="AMBALA AFS">AMBALA AFS</option>
          <option value="Amritsar AFS">Amritsar AFS</option>
          <option value="Awantipur AFS">Awantipur AFS</option>
          <option value="BAREILLY  AFS">BAREILLY AFS</option>
          <option value="Bhatinda AFS">Bhatinda AFS</option>
          <option value="Chandigarh AFS">Chandigarh AFS</option>
          <option value="Damtal AFS (Pathankot)">Damtal AFS (Pathankot)</option>
          <option value="Dehradun AFS">Dehradun AFS</option>
          <option value="Fursatganj AFS">Fursatganj AFS</option>
          <option value="Gorakhpur AFS">Gorakhpur AFS</option>
          <option value="Halwara AFS">Halwara AFS</option>
          <option value="HINDAN AFS">HINDAN AFS</option>
          <option value="Jaipur AFS">Jaipur AFS</option>
          <option value="Jaisalmer AFS">Jaisalmer AFS</option>
          <option value="JAMMU AFS">JAMMU AFS</option>
          <option value="Jodhpur AFS">Jodhpur AFS</option>
          <option value="Kanpur AFS">Kanpur AFS</option>
          <option value="Lucknow AFS">Lucknow AFS</option>
          <option value="Mohali AFS">Mohali AFS</option>
          <option value="NAL AFS">NAL AFS</option>
          <option value="PALAM AFS">PALAM AFS</option>
          <option value="SARSAWA AFS">SARSAWA AFS</option>
          <option value="Srinagar AFS">Srinagar AFS</option>
          <option value="Suratgarh AFS">Suratgarh AFS</option>
          <option value="Udaipur AFS">Udaipur AFS</option>
          <option value="Uttarlai AFS">Uttarlai AFS</option>
          <option value="Varanasi AFS">Varanasi AFS</option>

          <option value="DSO/DAO">DSO/DAO</option>
          <option value="Delhi DO">Delhi DO</option>
          <option value="Hisar DO">Hisar DO</option>
          <option value="Gurgaon DO">Gurgaon DO</option>
          <option value="Panipat DO">Panipat DO</option>
          <option value="Karnal AO">Karnal AO</option>
          <option value="Panipat Terminal">Panipat Terminal</option>
          <option value="Ambala Terminal">Ambala Terminal</option>
          <option value="Bijwasan Terminal">Bijwasan Terminal</option>
          <option value="Rewari Terminal">Rewari Terminal</option>
          <option value="Tikrikalan Terminal">Tikrikalan Terminal</option>
          <option value="Madanpurkhadar BP">Madanpurkhadar BP</option>
          <option value="Tikrikalan BP">Tikrikalan BP</option>
          <option value="Karnal BP">Karnal BP</option>

          <option value="AMRITSAR DO">AMRITSAR DO</option>
          <option value="SHIMLA AO">SHIMLA AO</option>
          <option value="Jalandhar BP">Jalandhar BP</option>
          <option value="Shimla DO">Shimla DO</option>
          <option value="Bhatinda Terminal">Bhatinda Terminal</option>
          <option value="Parwanoo Depot">Parwanoo Depot</option>
          <option value="Bhatinda DO">Bhatinda DO</option>
          <option value="Sangrur Terminal">Sangrur Terminal</option>
          <option value="Una BP">Una BP</option>
          <option value="Sangrur DO">Sangrur DO</option>
          <option value="Jammu BP">Jammu BP</option>
          <option value="Jammu Depot">Jammu Depot</option>
          <option value="Baddi BP">Baddi BP</option>
          <option value="Jalandhar AO">Jalandhar AO</option>
          <option value="Nabha BP">Nabha BP</option>
          <option value="Kargil Depot">Kargil Depot</option>
          <option value="Zewan Depot">Zewan Depot</option>
          <option value="Leh Depot">Leh Depot</option>
          <option value="Chandigarh AO">Chandigarh AO</option>
          <option value="Jammu DO/AO">Jammu DO/AO</option>
          <option value="Jalandhar Terminal">Jalandhar Terminal</option>
          <option value="Goindwal LPG BP Project">Goindwal LPG BP Project</option>
          <option value="Una terminal">Una terminal</option>
          <option value="Jal DO">Jal DO</option>
          <option value="Chandigarh DO">Chandigarh DO</option>
          <option value="LEH BP">LEH BP</option>
          <option value="Kullu Depot">Kullu Depot</option>
          <option value="PSO">PSO</option>

          <option value="Udaipur DO">Udaipur DO</option>
          <option value="Jaipur DO">Jaipur DO</option>
          <option value="Shimla DO">Shimla DO</option>
          <option value="Jodhpur DO & Jodhpur AO">Jodhpur DO & Jodhpur AO</option>
          <option value="Jaipur Terminal">Jaipur Terminal</option>
          <option value="Bharatpur Terminal">Bharatpur Terminal</option>
          <option value="Jaipur BP">Jaipur BP</option>
          <option value="Bikaner BP">Bikaner BP</option>
          <option value="Ajmer BP">Ajmer BP</option>
          <option value="Jhunjhunu BP">Jhunjhunu BP</option>
          <option value="RSO">RSO</option>
          <option value="Jodhpur Terminal">Jodhpur Terminal</option>
          <option value="CHITTORGARH TERMINAL">CHITTORGARH TERMINAL</option>


          <option value="Baitalpur Depot">Baitalpur Depot</option>
          <option value="Kanpur Terminal">Kanpur Terminal</option>
          <option value="Lucknow Terminal">Lucknow Terminal</option>
          <option value="Allahabad Terminal">Allahabad Terminal</option>
          <option value="Ambabai Depot">Ambabai Depot</option>
          <option value="Mughalsarai Tml">Mughalsarai Tml</option>
          <option value="UPSO-I">UPSO-I</option>
          <option value="Lucknow BP">Lucknow BP</option>
          <option value="Allahabad BP">Allahabad BP</option>
          <option value="Varanasi BP">Varanasi BP</option>
          <option value="Kanpur BP">Kanpur BP</option>
          <option value="Kanpur DO">Kanpur DO</option>
          <option value="Varanasi DO">Varanasi DO</option>
          <option value="Gorakhpur DO/AO">Gorakhpur DO/AO</option>
          <option value="Allahabad DO/AO">Allahabad DO/AO</option>
          <option value="Lucknow DO/AO">Lucknow DO/AO</option>


          <option value="UPSO-II, SO">UPSO-II, SO</option>
          <option value="Noida DO">Noida DO</option>
          <option value="Agra DO">Agra DO</option>
          <option value="Dehradun DO">Dehradun DO</option>
          <option value="Bareilly DO & AO">Bareilly DO & AO</option>
          <option value="Moradabad DO">Moradabad DO</option>
          <option value="Noida AO">Noida AO</option>
          <option value="Agra AO">Agra AO</option>
          <option value="Dehradun AO">Dehradun AO</option>
          <option value="Mathura Marketing Terminal">Mathura Marketing Terminal</option>
          <option value="BDFP Mathura">BDFP Mathura</option>
          <option value="MCO Mathura">MCO Mathura</option>
          <option value="Meerut Terminal">Meerut Terminal</option>
          <option value="Najibabad Terminal">Najibabad Terminal</option>
          <option value="Banthra Depot">Banthra Depot</option>
          <option value="Aonla Depot">Aonla Depot</option>
          <option value="Roorkee Terminal">Roorkee Terminal</option>
          <option value="Lalkuan Depot">Lalkuan Depot</option>
          <option value="Mathura BP">Mathura BP</option>
          <option value="Loni BP">Loni BP</option>
          <option value="Aligarh BP">Aligarh BP</option>
          <option value="Kashipur BP">Kashipur BP</option>
          <option value="Lakhimpur Kheri BP">Lakhimpur Kheri BP</option>
          <option value="Etawah BP">Etawah BP</option>
          <option value="Farukhabad BP">Farukhabad BP</option>
          <option value="Haldwani">Haldwani</option>
          <option value="Hardwar BP">Hardwar BP</option>
          <option value="Shahjahanpur BP">Shahjahanpur BP</option>


          <option value="SCFP-Manesar">SCFP-Manesar</option>
          <option value="Asaoti LBP">Asaoti LBP</option>
          <option value="CIP LBP ASAOTI">CIP LBP ASAOTI</option>
          <option value="SCFP">SCFP</option>

        </select>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <div class="password-strength" id="password-strength"></div>
      </div>

      <div class="form-group">
        <input type="submit" value="Register" name="submit">
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
    var dropdown = document.getElementById("fruitSelect");

    // Add an event listener to handle the selection change
    dropdown.addEventListener("change", function() {
      var selectedValue = dropdown.options[dropdown.selectedIndex].value;
      // alert("You selected: " + selectedValue);
    });
  </script>
</body>

</html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function sendemail_verify($fullname, $email, $verify_token)
{
  $mail = new PHPMailer(true);
  try {
    $mail->Mailer = "smtp";
    // $mail->SMTPDebug = 3;
    $mail->isSMTP();                                             //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
    $mail->SMTPAuth = true;
    $mail->Username   = 'myst14324@gmail.com';                  //SMTP username
    $mail->Password   = 'kaff pvyb fbqm heyx';                  //SMTP password
    $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('myst14324@gmail.com', 'Indian Oil Corporation Limited');
    $mail->addAddress($email);
    $mail->addAddress('myst14324@gmail.com');
    // $mail->addReplyTo('info@example.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Verification email';
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $email_template = "
  <h1>Registration Verification</h1>
  <p>Dear $fullname,</p>
  <p>Thank you for registering with us. To complete your registration, please verify your email address by clicking the button below:</p>
  <a class='verification-link' href='http://localhost/indianoil/Employee/verify_email.php?token=$verify_token'>Verify Email</a>
  <p>If you didn't request this registration or have any questions, please contact our support team.</p>
  <p>Best regards,<br>Indian Oil Corporation Limited</p>      
  ";
    $mail->Body = $email_template;
    $mail->send();
    return true;
  } catch (Exception $e) {
    return false;
  }
}
if (isset($_POST['submit'])) {


  $filename = $_FILES["profile"]["name"];
  $tempname = $_FILES["profile"]["tmp_name"];
  $folder   = "../empphoto/" . $filename;
  move_uploaded_file($tempname, $folder);

  // Your database connection code goes here (initialize $conn)

  $fullname = $_POST['fullname'];
  $employeeid = $_POST['employeeid'];
  $email = $_POST['email'];
  $location = $_POST['location'];
  $password = $_POST['password'];
  $dob = $_POST['dob'];
  $verify_token = md5(rand());

  // Use prepared statements or other methods to secure your SQL query

  $query = "INSERT INTO `ragister` (folder, fullname, employeeid, dob, email, location, password, verify_token) VALUES ('$folder', '$fullname', '$employeeid', '$dob','$email', '$location', '$password','$verify_token')";
  $data = mysqli_query($conn, $query);
  if ($data) {
    sendemail_verify("$fullname", "$email", "$verify_token");
    echo '<script> alert("REGISTRATION SUCCESSFUL!! PLEASE VERIFY YOUR EMAIL ADDRESS!") </script>';
    exit(0);
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
?>