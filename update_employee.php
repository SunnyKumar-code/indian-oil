<?PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("db/iocldb.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the updated employee details from the form
    $employee_id = mysqli_real_escape_string($conn, $_POST['employeeid']);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Validate and sanitize inputs
    // ...

    // Update the employee details in the database
    $query = "UPDATE ragister SET 
        fullname = '$fullname',
        dob = '$dob',
        email = '$email',
        location = '$location',
        password = '$password'
        WHERE employeeid = '$employee_id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Close the database connection
        mysqli_close($conn);
    
        // Alert message
        echo '<script>';
        echo 'alert("Details updated successfully");';
        echo 'window.location.href = "empedit.php?employeeid=' . $employee_id . '&success=true";';
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