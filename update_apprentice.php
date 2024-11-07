<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("db/iocldb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated apprentice details from the form
    $vendor_code = mysqli_real_escape_string($conn, $_POST['vendor_code']);
    $name = mysqli_real_escape_string($conn, $_POST['Name']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $registration = mysqli_real_escape_string($conn, $_POST['Registration']);
    $status = mysqli_real_escape_string($conn, $_POST['Status']);
    $discipline = mysqli_real_escape_string($conn, $_POST['Discipline']);
    $enrollment_id = mysqli_real_escape_string($conn, $_POST['Enrollment_ID']);
    $contract_no = mysqli_real_escape_string($conn, $_POST['Contact_No']);
    $state = mysqli_real_escape_string($conn, $_POST['State']);
    $state_office = mysqli_real_escape_string($conn, $_POST['State_Office']);
    $mobile_no = mysqli_real_escape_string($conn, $_POST['Mobile_No']);
    $date_of_joining = mysqli_real_escape_string($conn, $_POST['Date_Of_Joining']);
    $cl_balance = mysqli_real_escape_string($conn, $_POST['cl_balance']);
    $gl_balance = mysqli_real_escape_string($conn, $_POST['gl_balance']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Update the apprentice details in the database
    $query = "UPDATE apprentice SET 
        Name = '$name',
        dob = '$dob',
        Email = '$email',
        Registration = '$registration',
        Status = '$status',
        Discipline = '$discipline',
        Enrollment_ID = '$enrollment_id',
        Contact_No = '$contract_no',
        State = '$state',
        State_Office = '$state_office',
        Mobile_No = '$mobile_no',
        Date_Of_Joining = '$date_of_joining',
        cl_balance = '$cl_balance',
        gl_balance = '$gl_balance',
        Location = '$location',
        Password = '$password'
        WHERE vendor_code = '$vendor_code'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Close the database connection
        mysqli_close($conn);
    
        // Alert message
        echo '<script>';
        echo 'alert("Details updated successfully");';
        echo 'window.location.href = "appedit.php?vendor_code=' . $vendor_code . '&success=true";';
        echo '</script>';
        exit();
    } else {
        // Handle the case where the update query fails
        error_log("Error updating employee details: " . mysqli_error($conn));
        echo "Error updating details. Please try again later.";
        exit();
    }
    
}
?>
