<?php
session_start();
include("db/iocldb.php");
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (!isset($_SESSION['username'])) {
    header("Location: adminlogin.php");
    exit();
}

if (isset($_POST['save_excel_data'])) {
    $fileName = $_FILES['import_file']['name'];
    $file_ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed_ext = ['xls', 'csv', 'xlsx'];

    if (in_array($file_ext, $allowed_ext)) {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        foreach ($data as $row) {
            $registration = $data[1];
            $vendor_code = $data[2];
            $name = $data[3];
            $dob = $data[4];
            $status = $data[5];
            $discipline = $data[6];
            $enrollment_id = $data[7];
            $contract_no = $data[8];
            $state = $data[9];
            $state_office = $data[10];
            $location = $data[11];
            $mobile_no = $data[12];
            $email = $data[13];
            $date_of_joining = $data[14];


            $Apprenticequery = "INSERT INTO `apprentice` (Registration,vendor_code,Name,dob, Discipline,Enrollment_ID,Contact_No,State,State_Office,Location,Mobile_No,Email,Date_Of_Joining) 
            VALUES ('$registration', '$vendor_code', '$name', '$dob', '$discipline', '$enrollment_id','$contract_no','$state','$state_office','$location','$mobile_no','$email','$date_of_joining')";
            $data = mysqli_query($conn, $Apprenticequery);

            $msg = true;

            if (isset($msg)) {
                $_SESSION['message'] = "Successful Upload!!";
                header("Location: admindata.php");
                exit();
            } else {
                $_SESSION['message'] = "Un-Successful Upload!!";
                header("Location: admindata.php");
                exit();
            }
        }
    } else {
        echo 'Invalid File';
        $_SESSION['message'] = "Invalid File!";
        header("Location: admindata.php");
        exit();
    }
} else {
    $_SESSION['message'] = "Form not submitted properly.";
    header("Location: admin.php");
    exit();
}
