<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
include("db/iocldb.php");
include("count.php");
include("search.php");

if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
    exit();
}

$employee_id = isset($_GET['employeeid']) ? $_GET['employeeid'] : '';

// Fetch employee details based on the employee_id from the session
$employee_id = mysqli_real_escape_string($conn, $employee_id);
$query = "SELECT * FROM ragister WHERE employeeid = '$employee_id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="styles.css"> <!-- Add this line to include the new CSS file -->
    <title>Edit Employee</title>


    
</head>

<body>
    <nav>
        <a href="admin.php"><i class="fas fa-home"></i></a>
        <a href="admindata.php?username=<?php echo $_SESSION['username']; ?>"><i class="fas fa-chart-bar"></i></a>
        <a href="adminedit.php?username=<?php echo $_SESSION['username']; ?>"><i class="fas fa-cog"></i></a>
        <a href="adminlogout.php"><i class="fas fa-sign-out-alt"></i></a>
    </nav>

    <div class="content-container">
        <h1>Edit Employee</h1>
        <?php if ($row) : ?>
            <form method="POST" action="update_employee.php">
                <input type="hidden" name="employeeid" value="<?php echo $row['employeeid']; ?>">
                <div>
                    <label for="fullname">Full Name:</label>
                    <input type="text" id="fullname" name="fullname" value="<?php echo $row['fullname']; ?>">
                </div>
                <div>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
                </div>
                <div>
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>">
                </div>
                <div>
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
                <div>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo $row['password']; ?>">
        <span id="showPassword" style="position: absolute; top: 425px; right: 25px; cursor: pointer;">👁️</span>
    </div>
                <div>
                    <input type="submit" value="Save">
                </div>
            </form>
        <?php else : ?>
            <p>Employee not found.</p>
        <?php endif; ?>
    </div>

    <script src="admin.js"></script>
</body>

<script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('password');
            const showPasswordIcon = document.getElementById('showPassword');

            showPasswordIcon.addEventListener('click', function () {
                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                }
            });
        });
    </script>
</html>