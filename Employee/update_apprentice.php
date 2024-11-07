<?php
session_start();
include("../db/iocldb.php");

// Check if the user is logged in or redirect to the login page if not
if (!isset($_SESSION['employeeid'])) {
    header("Location: ../login.php"); // Adjust the login page URL as needed
    exit();
}
?>

<?php
$success = false; // Initialize the success flag

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated apprentice details from the form
    $vendor_code = $_POST['vendor_code'];
    $name = $_POST['name'];
    $location = $_POST['location'];
    $dob = $_POST['dob'];
    $Discipline = $_POST['Discipline'];
    $reg = $_POST['registration'];
    $state = $_POST['State'];
    $stateoff = $_POST['State-office'];
    $mob = $_POST['Mobile'];
    $email = $_POST['email'];

    // Update the apprentice details in the database
    $query = "UPDATE apprentice SET Name = '$name',
        Location = '$location' ,
        dob = '$dob',
        Discipline = '$Discipline',
        Registration = '$reg' ,
        State = '$state',
        State_Office = '$stateoff',
        Mobile_No ='$mob',
        Email = '$email'
        WHERE vendor_code = '$vendor_code'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Set the success flag if the update is successful
        $success = true;
    } else {
        // Handle the case where the update query fails
        echo "Error updating apprentice details: " . mysqli_error($conn);
    }
}

// // Close the database connection
// mysqli_close($conn);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Update Apprentice Details</title>
    <style>
        body {
            background-image: url("../IMAGE/background.jpg");
            background-size: cover;
            background-position: center;
            backdrop-filter: blur(5px);
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"],
        input[type="date"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        Select {
            width: 95%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
        #success-message {
            display: <?php echo $success ? 'block' : 'none'; ?>;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- Your HTML form for updating apprentice details goes here -->
    <?php
    
    // Check if vendor_code is provided in the URL
    if (isset($_GET['vendor_code'])) {
        $vendor_code = $_GET['vendor_code'];

        // Fetch apprentice details based on the vendor_code
        $query = "SELECT * FROM apprentice WHERE vendor_code = '$vendor_code'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);


        if (!$row) {
            // Apprentice not found, handle this case accordingly (e.g., show an error message)
            echo "Apprentice not found.";
        } else {
            // Display a form to edit apprentice details
    ?>
            <h1>Edit Apprentice</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="vendor_code" value="<?php echo $row['vendor_code']; ?>">
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $row['Name']; ?>">
                </div>
                <div>
                    <label for="location">Location:</label>
                    <select id="location" name="location" value="<?php echo $row['Location']; ?>" required>
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
                    <label for="registration">Registration No:</label>
                    <input type="text" id="registration" name="registration" value="<?php echo $row['Registration']; ?>">
                </div>
                <div>
                    <label for="dob">Date Of Birth:</label>
                    <input type="date" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
                </div>
                <div>
                    <label for="Discipline">Disipline:</label>
                    <select id="Discipline" name="Discipline" value="<?php echo $row['Discipline']; ?>" required>
                        <option value="Trade">Trade</option>
                        <option value="Graduate">Graduate</option>
                        <option value="Data Entry">Data Entry</option>
                        <option value="Retail Sales">Retail Sales</option>
                        <option value="Technician">Technician</option>
                    </select>
                </div>
                <div>
                    <label for="State">State:</label>
                    <input type="text" id="State" name="State" value="<?php echo $row['State']; ?>">
                </div>
                <div>
                    <label for="State-office">State-office:</label>
                    <input type="text" id="State-office" name="State-office" value="<?php echo $row['State_Office']; ?>">
                </div>
                <div>
                    <label for="Mobile-no"> Mobile-No:</label>
                    <input type="text" id="Mobile-no" name="Mobile" value="<?php echo $row['Mobile_No']; ?>">
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" value="<?php echo $row['Email']; ?>">
                </div>
                <div>
                    <label for="Date_Of_Joining">Date Of Joining:</label>
                    <input type="date" id="Date_Of_Joining" name="Date_Of_Joining" value="<?php echo $row['Date_Of_Joining']; ?>">
                </div>
                <div>
                    <input type="submit" value="Save">
                </div>
            </form>
    <?php
        }
    }
    
    // Close the database connection
    mysqli_close($conn);
    ?>
    <?php if ($success) : ?>
        <div id="success-message">DATA UPDATE SUCCESSFUL!!</div>
    <?php endif; ?>

    
</body>

</html>

